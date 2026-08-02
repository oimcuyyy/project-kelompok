<?php

use App\Models\Recipe;

Recipe::create([
    'title' => 'Salad Bowl Mangkuk Segar',
    'category' => 'Sehat',
    'cooking_time' => 15,
    'image' => 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=600',
    'description' => 'Perpaduan sayuran segar, alpukat, dan dressing olive oil khas mediterranea.',
    'ingredients' => "1 buah Alpukat\n100g Sayur Selada\n5 buah Tomat Ceri\n2 sdm Olive Oil",
    'steps' => "Cuci bersih semua sayuran\nPotong alpukat dan tomat ceri\nCampurkan semua bahan di mangkuk lalu siram olive oil",
]);

Recipe::create([
    'title' => 'Mie Goreng Spesial Pedas',
    'category' => 'Nusantara',
    'cooking_time' => 20,
    'image' => 'https://images.unsplash.com/photo-1555396273-367ea4eb4db5?w=600',
    'description' => 'Mie goreng khas bumbu rempah melimpah dengan topping telur dan udang.',
    'ingredients' => "1 bungkus Mie\n2 siung Bawang Putih\n5 buah Cabai Rawit\n1 butir Telur",
    'steps' => "Rebus mie hingga setengah matang lalu tiriskan\nTumis bawang dan cabai hingga harum\nMasukkan telur lalu orak-arik\nMasukkan mie dan bumbu, aduk hingga matang",
]);
