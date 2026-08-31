<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MaintenanceMode
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $maintenanceFile = storage_path('app/maintenance.json');
        if (file_exists($maintenanceFile) && !app()->runningInConsole()) {
            $isAdmin = session('is_admin') || $request->cookie('is_admin_vercel') === 'true';
            
            // Allow admin login paths
            if ($request->is('admin/login') || $request->is('admin/force-login') || $request->is('admin') || $request->is('admin/logout')) {
                return $next($request);
            }

            if (!$isAdmin) {
                $data = json_decode(file_get_contents($maintenanceFile), true);
                return response()->view('maintenance', compact('data'));
            }
        }
        
        return $next($request);
    }
}
