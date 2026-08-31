<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

$app = Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->web(append: [
            \App\Http\Middleware\MaintenanceMode::class,
        ]);
        // Percayai semua proxy di serverless (Vercel / Cloudflare) agar HTTPS terdeteksi
        $middleware->trustProxies(at: '*');
        $middleware->validateCsrfTokens(except: [
            '/admin/login',
            '/midtrans-callback',
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->shouldRenderJsonWhen(
            fn (Request $request) => $request->is('api/*'),
        );
    })->create();

// Override storage path ke /tmp/storage agar Laravel bisa menulis file di Vercel serverless
// Hanya aktif jika APP_STORAGE di-set secara eksplisit (misal: di Vercel)
if ($storagePath = getenv('APP_STORAGE')) {
    $app->useStoragePath($storagePath);
}

return $app;
