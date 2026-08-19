<?php

// Set storage path ke /tmp agar Laravel bisa menulis di Vercel serverless
$_ENV['APP_STORAGE'] = '/tmp';
putenv('APP_STORAGE=/tmp');

// Buat folder-folder yang dibutuhkan Laravel di /tmp
foreach ([
    '/tmp/views',
    '/tmp/cache/data',
    '/tmp/sessions',
    '/tmp/logs',
    '/tmp/framework/cache',
    '/tmp/framework/sessions',
    '/tmp/framework/views',
] as $dir) {
    if (!is_dir($dir)) {
        @mkdir($dir, 0777, true);
    }
}

// Salin database SQLite ke /tmp agar bisa dibaca dan ditulis
$sourceDb = __DIR__ . '/../database/database.sqlite';
$targetDb  = '/tmp/database.sqlite';

if (!file_exists($targetDb) && file_exists($sourceDb)) {
    @copy($sourceDb, $targetDb);
}

// Jalankan aplikasi Laravel
require __DIR__ . '/../public/index.php';
