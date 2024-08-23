<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Role::create([
            'name' => 'Admin',
        ]);

        Role::create([
            'name' => 'User',
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'id_role' => 1,
        ]);

        User::create([
            'name' => 'User',
            'email' => 'user1@gmail.com',
            'password' => bcrypt('user123'),
            'id_role' => 2,
        ]);

        User::create([
            'name' => 'User',
            'email' => 'user2@gmail.com',
            'password' => bcrypt('user123'),
            'id_role' => 2,
        ]);

        Category::create([
            'name' => 'Laptop',
        ]);

        Category::create([
            'name' => 'Smartphone',
        ]);

        Product::create([
            'name' => 'Asus ROG',
            'id_category' => 1,
            'harga' => 20000000,
            'stok_awal' => 10,
            'deskripsi' => 'Laptop Gaming',
            'image' => 'asus-rog.jpg',
        ]);

        Product::create([
            'name' => 'Acer Predator',
            'id_category' => 1,
            'harga' => 15000000,
            'stok_awal' => 10,
            'deskripsi' => 'Laptop Gaming',
            'image' => 'acer-predator.jpg',
        ]);

        Product::create([
            'name' => 'Iphone 12',
            'id_category' => 2,
            'harga' => 15000000,
            'stok_awal' => 10,
            'deskripsi' => 'Smartphone',
            'image' => 'iphone-12.jpg',
        ]);

        Product::create([
            'name' => 'Samsung Galaxy S21',
            'id_category' => 2,
            'harga' => 12000000,
            'stok_awal' => 10,
            'deskripsi' => 'Smartphone',
            'image' => 'samsung-galaxy-s21.jpg',
        ]);

        Product::create([
            'name' => 'Xiaomi Redmi Note 10',
            'id_category' => 2,
            'harga' => 3000000,
            'stok_awal' => 10,
            'deskripsi' => 'Smartphone',
            'image' => 'xiaomi-redmi-note-10.jpg',
        ]);

        Product::create([
            'name' => 'Dell XPS',
            'id_category' => 1,
            'harga' => 25000000,
            'stok_awal' => 10,
            'deskripsi' => 'Laptop',
            'image' => 'dell-xps.jpg',
        ]);

        Product::create([
            'name' => 'Macbook Pro',
            'id_category' => 1,
            'harga' => 30000000,
            'stok_awal' => 10,
            'deskripsi' => 'Laptop',
            'image' => 'macbook-pro.jpg',
        ]);

        Product::create([
            'name' => 'Oneplus 9',
            'id_category' => 2,
            'harga' => 10000000,
            'stok_awal' => 10,
            'deskripsi' => 'Smartphone',
            'image' => 'oneplus-9.jpg',
        ]);

        Product::create([
            'name' => 'Vivo V21',
            'id_category' => 2,
            'harga' => 5000000,
            'stok_awal' => 10,
            'deskripsi' => 'Smartphone',
            'image' => 'vivo-v21.jpg',
        ]);

        Product::create([
            'name' => 'Realme 8',
            'id_category' => 2,
            'harga' => 4000000,
            'stok_awal' => 10,
            'deskripsi' => 'Smartphone',
            'image' => 'realme-8.jpg',
        ]);

        Product::create([
            'name' => 'HP Pavilion',
            'id_category' => 1,
            'harga' => 10000000,
            'stok_awal' => 10,
            'deskripsi' => 'Laptop',
            'image' => 'hp-pavilion.jpg',
        ]);

        Product::create([
            'name' => 'Lenovo Legion',
            'id_category' => 1,
            'harga' => 18000000,
            'stok_awal' => 10,
            'deskripsi' => 'Laptop',
            'image' => 'lenovo-legion.jpg',
        ]);

        Product::create([
            'name' => 'Google Pixel 5',
            'id_category' => 2,
            'harga' => 8000000,
            'stok_awal' => 10,
            'deskripsi' => 'Smartphone',
            'image' => 'google-pixel-5.jpg',
        ]);
    }
}
