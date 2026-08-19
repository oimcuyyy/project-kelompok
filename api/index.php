<?php

// Tampilkan error agar bisa dideteksi
ini_set('display_errors', '1');
error_reporting(E_ALL);

// Set timezone
date_default_timezone_set('Asia/Jakarta');

// Buat semua direktori yang dibutuhkan Laravel di /tmp
$dirs = [
    '/tmp/storage/app/public',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/framework/views',
    '/tmp/storage/logs',
    '/tmp/bootstrap/cache',
];
foreach ($dirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }
}

// Salin database SQLite ke /tmp sesuai dengan vercel.json
$sourceDb = __DIR__ . '/../database/database.sqlite';
$targetDb = '/tmp/database.sqlite';
if (!file_exists($targetDb) && file_exists($sourceDb)) {
    copy($sourceDb, $targetDb);
}

// Set environment variables untuk path storage dan database
$_ENV['APP_STORAGE'] = '/tmp/storage';
putenv('APP_STORAGE=/tmp/storage');
putenv('DB_DATABASE=/tmp/database.sqlite');
$_SERVER['DB_DATABASE'] = '/tmp/database.sqlite';

// Jalankan Laravel
require __DIR__ . '/../public/index.php';