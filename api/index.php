<?php

// Set timezone
date_default_timezone_set('Asia/Jakarta');

// Buat semua direktori yang dibutuhkan Laravel di /tmp
$dirs = [
    '/tmp/views',
    '/tmp/cache/data',
    '/tmp/sessions',
    '/tmp/logs',
    '/tmp/framework/cache/data',
    '/tmp/framework/sessions',
    '/tmp/framework/views',
    '/tmp/storage/app/public',
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
$sourceDb = __DIR__ . '/../database/database.sqlite';
$targetDb = '/tmp/database.sqlite';
if (!file_exists($targetDb) && file_exists($sourceDb)) {
    @copy($sourceDb, $targetDb);
}

// Set environment variables
$_ENV['APP_STORAGE'] = '/tmp/storage';
putenv('APP_STORAGE=/tmp/storage');
$_ENV['DB_DATABASE'] = '/tmp/database.sqlite';
putenv('DB_DATABASE=/tmp/database.sqlite');
$_SERVER['DB_DATABASE'] = '/tmp/database.sqlite';

// Jalankan Laravel
require __DIR__ . '/../public/index.php';