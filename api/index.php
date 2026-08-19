<?php

// Pastikan direktori cache dan temporary storage di /tmp tersedia (karena Vercel serverless read-only di root)
$directories = [
    '/tmp/views',
    '/tmp/cache',
    '/tmp/sessions',
];

foreach ($directories as $dir) {
    if (!is_dir($dir)) {
        @mkdir($dir, 0777, true);
    }
}

// Salin database SQLite yang sudah berisi 27 resep ke /tmp/database.sqlite jika belum ada
$sourceDb = __DIR__ . '/../database/database.sqlite';
$targetDb = '/tmp/database.sqlite';

if (!file_exists($targetDb)) {
    if (file_exists($sourceDb)) {
        @copy($sourceDb, $targetDb);
    } else {
        @touch($targetDb);
    }
}

// Teruskan request ke public/index.php bawaan Laravel
require __DIR__ . '/../public/index.php';
