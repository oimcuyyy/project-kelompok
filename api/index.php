<?php

// Tampilkan semua error
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

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
$targetDb = '/tmp/database.sqlite';
if (!file_exists($targetDb) || filesize($targetDb) === 0) {
    if (file_exists($sourceDb)) {
        @copy($sourceDb, $targetDb);
        @chmod($targetDb, 0777);
    } else {
        @touch($targetDb);
        @chmod($targetDb, 0777);
    }
}

// Set environment variables
$_ENV['APP_STORAGE'] = '/tmp/storage';
putenv('APP_STORAGE=/tmp/storage');
$_ENV['DB_DATABASE'] = '/tmp/database.sqlite';
putenv('DB_DATABASE=/tmp/database.sqlite');
$_SERVER['DB_DATABASE'] = '/tmp/database.sqlite';

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