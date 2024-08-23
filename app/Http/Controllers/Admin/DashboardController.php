<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlah_product = Product::count();
        $jumlah_kategori = Category::count();
        $jumlah_user = User::count();
        $jumlah_transaksi = Transaksi::count();
        return view('admin.pages.dashboard', [
            'jumlah_product' => $jumlah_product,
            'jumlah_kategori' => $jumlah_kategori,
            'jumlah_user' => $jumlah_user,
            'jumlah_transaksi' => $jumlah_transaksi
        ]);
    }
}
