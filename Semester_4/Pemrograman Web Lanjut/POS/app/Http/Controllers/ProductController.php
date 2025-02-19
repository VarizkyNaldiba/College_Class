<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Method untuk menampilkan produk Food & Beverage
    public function foodBeverage()
    {
        // Data produk (contoh statis)
        $products = [
            ['name' => 'Coca-Cola', 'price' => 15000],
            ['name' => 'Pepsi', 'price' => 14000],
            ['name' => 'Mie Instan', 'price' => 5000],
        ];

        // Kirim data ke view
        return view('products.food-beverage', ['products' => $products]);
    }

    // Method untuk menampilkan produk Beauty & Health
    public function beautyHealth()
    {
        // Data produk (contoh statis)
        $products = [
            ['name' => 'Face Cream', 'price' => 75000],
            ['name' => 'Body Lotion', 'price' => 60000],
            ['name' => 'Shampoo', 'price' => 45000],
        ];

        // Kirim data ke view
        return view('products.beauty-health', ['products' => $products]);
    }

    // Method untuk menampilkan produk Home Care
    public function homeCare()
    {
        // Data produk (contoh statis)
        $products = [
            ['name' => 'Detergent', 'price' => 20000],
            ['name' => 'Floor Cleaner', 'price' => 25000],
            ['name' => 'Glass Cleaner', 'price' => 15000],
        ];

        // Kirim data ke view
        return view('products.home-care', ['products' => $products]);
    }

    // Method untuk menampilkan produk Baby & Kid
    public function babyKid()
    {
        // Data produk (contoh statis)
        $products = [
            ['name' => 'Diapers', 'price' => 80000],
            ['name' => 'Baby Milk', 'price' => 120000],
            ['name' => 'Baby Wipes', 'price' => 30000],
        ];

        // Kirim data ke view
        return view('products.baby-kid', ['products' => $products]);
    }
}