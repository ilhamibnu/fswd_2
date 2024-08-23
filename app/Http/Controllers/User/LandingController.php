<?php

namespace App\Http\Controllers\User;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LandingController extends Controller
{
    public function index(Request $request)
    {
        $kategori = Category::all();
        $id_kategori = $request->id_kategori;
        $filter = $request->filter;

        // Mulai query dengan relasi 'category'
        $query = Product::with('category');

        // Filter berdasarkan kategori jika id_kategori ada
        if ($id_kategori != null) {
            $query->where('id_category', $id_kategori);
        }

        // Filter berdasarkan pilihan filter
        if ($filter == '1') {
            $query->orderBy('id', 'desc'); // Produk terbaru
        } elseif ($filter == '2') {
            $query->orderBy('harga', 'asc'); // Produk termurah ke termahal
        } elseif ($filter == '3') {
            $query->orderBy('harga', 'desc'); // Produk termahal ke termurah
        }

        // Eksekusi query
        $product = $query->get();

        return view('user.pages.index', [
            'product' => $product,
            'kategori' => $kategori
        ]);
    }


    public function detail($id)
    {
        $product = Product::with('category')->find($id);
        $productbycategori = Product::with('category')->where('id_category', $product->id_category)->where('id', '!=', $id)->get();
        return view(
            'user.pages.detail',
            [
                'product' => $product,
                'productbycategori' => $productbycategori
            ]
        );
    }

    public function cart()
    {
        $sum_total = Cart::where('id_user', Auth::user()->id)->sum('total_harga');
        $cart = Cart::with('product')->where('id_user', Auth::user()->id)->get();
        return view('user.pages.cart', [
            'cart' => $cart,
            'sum_total' => $sum_total
        ]);
    }

    public function transaksi()
    {
        $transaksi = Transaksi::with('detailTransaksi')->where('id_user', Auth::user()->id)->get();
        return view('user.pages.my-account', [
            'transaksi' => $transaksi
        ]);
    }
}
