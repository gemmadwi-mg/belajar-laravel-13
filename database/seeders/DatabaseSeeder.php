<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Seed Users
        $user1 = User::create([
            'name' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'password' => Hash::make('password'),
        ]);

        $user2 = User::create([
            'name' => 'Siti Aminah',
            'email' => 'siti@example.com',
            'password' => Hash::make('password'),
        ]);

        // 2. Seed Categories
        $elektronik = Category::create(['name' => 'Elektronik', 'slug' => 'elektronik']);
        $pakaian = Category::create(['name' => 'Pakaian', 'slug' => 'pakaian']);
        $buku = Category::create(['name' => 'Buku', 'slug' => 'buku']);

        // 3. Seed Products
        Product::create([
            'user_id' => $user1->id,
            'category_id' => $elektronik->id,
            'title' => 'Laptop Gaming',
            'price' => 15000000,
            'stock' => 5,
            'is_active' => true,
        ]);

        Product::create([
            'user_id' => $user1->id,
            'category_id' => $elektronik->id,
            'title' => 'Smartphone Android',
            'price' => 3500000,
            'stock' => 0, // Stok habis
            'is_active' => true,
        ]);

        Product::create([
            'user_id' => $user2->id,
            'category_id' => $pakaian->id,
            'title' => 'Kaos Polos Cotton',
            'price' => 75000,
            'stock' => 50,
            'is_active' => true,
        ]);

        Product::create([
            'user_id' => $user2->id,
            'category_id' => $pakaian->id,
            'title' => 'Jaket Parasut',
            'price' => 250000,
            'stock' => 12,
            'is_active' => false, // Non-aktif
        ]);

        Product::create([
            'user_id' => $user1->id,
            'category_id' => $buku->id,
            'title' => 'Buku Belajar Laravel 13',
            'price' => 120000,
            'stock' => 20,
            'is_active' => true,
        ]);
    }
}