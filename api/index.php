<?php

// Tampilkan semua error saat debug
ini_set('display_errors', '0');
error_reporting(E_ALL & ~E_DEPRECATED);

// Set timezone
date_default_timezone_set('Asia/Jakarta');

// Buat semua direktori yang dibutuhkan Laravel di /tmp
$dirs = [
    '/tmp/views',
    '/tmp/cache/data',
    '/tmp/sessions',
    '/tmp/logs',
    '/tmp/storage',
    '/tmp/storage/app',
    '/tmp/storage/app/public',
    '/tmp/storage/framework',
    '/tmp/storage/framework/cache',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/framework/views',
    '/tmp/storage/logs',
    '/tmp/bootstrap/cache',
];
foreach ($dirs as $dir) {
    if (!is_dir($dir)) {
        @mkdir($dir, 0777, true);
    }
}

// Salin database SQLite ke /tmp jika belum ada
$sourceDb = dirname(__DIR__) . '/database/database.sqlite';
$targetDb = '/tmp/database_v2.sqlite';
if (!file_exists($targetDb) || filesize($targetDb) === 0) {
    if (file_exists($sourceDb)) {
        @copy($sourceDb, $targetDb);
        @chmod($targetDb, 0777);
    } else {
        @touch($targetDb);
        @chmod($targetDb, 0777);
    }
}

// Inisialisasi seluruh environment variable driver secara eksplisit
$envVars = [
    'APP_STORAGE' => '/tmp/storage',
    'APP_CONFIG_CACHE' => '/tmp/config.php',
    'APP_EVENTS_CACHE' => '/tmp/events.php',
    'APP_PACKAGES_CACHE' => '/tmp/packages.php',
    'APP_ROUTES_CACHE' => '/tmp/routes.php',
    'APP_SERVICES_CACHE' => '/tmp/services.php',
    'VIEW_COMPILED_PATH' => '/tmp/storage/framework/views',
    'DB_DATABASE' => '/tmp/database_v2.sqlite',
    'DB_CONNECTION' => 'sqlite',
    'SESSION_DRIVER' => 'cookie',
    'SESSION_LIFETIME' => '10080',
    'CACHE_STORE' => 'array',
    'CACHE_DRIVER' => 'array',
    'LOG_CHANNEL' => 'single',
    'BROADCAST_CONNECTION' => 'log',
    'BROADCAST_DRIVER' => 'log',
    'FILESYSTEM_DISK' => 'local',
    'FILESYSTEM_DRIVER' => 'local',
    'QUEUE_CONNECTION' => 'sync',
    'MAIL_MAILER' => 'log',
    'APP_MAINTENANCE_DRIVER' => 'file',
];

foreach ($envVars as $key => $val) {
    $_ENV[$key] = $val;
    $_SERVER[$key] = $val;
    putenv("{$key}={$val}");
}

try {
    require dirname(__DIR__) . '/public/index.php';
} catch (\Throwable $e) {
    http_response_code(500);
    echo "<div style='font-family:sans-serif;padding:30px;background:#fff1f2;border:2px solid #e11d48;border-radius:10px;margin:20px;'>";
    echo "<h2 style='color:#be123c;margin-top:0;'>⚠️ Laravel Exception Occurred</h2>";
    echo "<p><strong>Message:</strong> " . htmlspecialchars($e->getMessage()) . "</p>";
    echo "<p><strong>File:</strong> " . htmlspecialchars($e->getFile()) . " (Line " . $e->getLine() . ")</p>";
    echo "<h3 style='color:#be123c;'>Stack Trace:</h3>";
    echo "<pre style='background:#ffffff;padding:15px;border:1px solid #fda4af;border-radius:6px;overflow-x:auto;font-size:12px;'>" . htmlspecialchars($e->getTraceAsString()) . "</pre>";
    echo "</div>";
}