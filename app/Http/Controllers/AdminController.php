<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        $key = 'login_attempts_' . $request->ip();

        if (RateLimiter::tooManyAttempts($key, 3)) {
            $seconds = RateLimiter::availableIn($key);
            $message = "Terlalu banyak percobaan. Coba lagi dalam {$seconds} detik.";
            
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json(['success' => false, 'message' => $message], 429);
            }
            return redirect()->back()->with('error', $message);
        }

        $email = $request->input('email');
        $password = $request->input('password');

        $adminEmail = env('ADMIN_EMAIL', 'belajarmandiri03034@gmail.com');
        $adminPassword = env('ADMIN_PASSWORD', 'oimaja25');

        if ($email === $adminEmail && $password === $adminPassword) {
            RateLimiter::clear($key);
            session(['is_admin' => true]);

            if ($request->ajax() || $request->wantsJson()) {
                return response()->json(['success' => true, 'message' => 'Berhasil masuk sebagai Admin!', 'redirect' => route('transactions.index')])->cookie('is_admin_vercel', 'true', 10080);
            }
            return redirect()->route('transactions.index')->cookie('is_admin_vercel', 'true', 10080)->with('success', 'Selamat datang di Dashboard Admin!');
        }

        RateLimiter::hit($key, 60);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json(['success' => false, 'message' => 'Email atau kata sandi admin salah!'], 401);
        }
        return redirect()->back()->with('error', 'Email atau kata sandi admin salah!');
    }

    public function forceLogin()
    {
        session(['is_admin' => true]);
        return redirect()->route('transactions.index')->cookie('is_admin_vercel', 'true', 10080)->with('success', 'Berhasil masuk melalui jalur khusus!');
    }

    public function logout()
    {
        session()->flush();
        $cookie = cookie('is_admin_vercel', 'false', -1);
        return redirect()->route('home')->with('success', 'Anda telah keluar dari Mode Admin.')->withCookie($cookie);
    }

    public function maintenance()
    {
        if ((!session('is_admin') && request()->cookie('is_admin_vercel') !== 'true')) {
            return redirect()->route('home', ['admin' => 1])->with('error', 'Akses terbatas!');
        }
        
        $maintenanceData = file_exists(storage_path('app/maintenance.json')) ? json_decode(file_get_contents(storage_path('app/maintenance.json')), true) : [];
        
        return view('maintenance-admin', compact('maintenanceData'));
    }

    public function toggleMaintenance(Request $request)
    {
        if ((!session('is_admin') && request()->cookie('is_admin_vercel') !== 'true')) return back();
        
        $file = storage_path('app/maintenance.json');
        if ($request->status === 'on') {
            $data = [
                'estimated_time' => $request->estimated_time,
                'admin_name' => $request->admin_name,
                'message' => $request->message,
            ];
            file_put_contents($file, json_encode($data));
            return back()->with('success', 'Mode Pengembangan berhasil diaktifkan! Pengunjung awam akan melihat halaman maintenance.');
        } else {
            if (file_exists($file)) unlink($file);
            return back()->with('success', 'Mode Pengembangan dimatikan. Website berjalan normal.');
        }
    }
}
