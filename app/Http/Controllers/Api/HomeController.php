<?php

namespace App\Http\Controllers\Api;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $product = Product::with('category')->get();
        return response()->json([
            'success' => true,
            'message' => 'List Data Product',
            'data' => $product
        ], 200);
    }

    public function detail($id)
    {
        $product = Product::with('category')->find($id);
        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Data Product Tidak Ditemukan',
                'data' => ''
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail Data Product',
            'data' => $product
        ], 200);
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $product = Product::with('category')
            ->where('name', 'like', "%" . $keyword . "%")
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Search Data Product',
            'data' => $product
        ], 200);
    }

    public function cart()
    {
        $cart = Cart::with('product')->where('id_user', Auth::user()->id)->get();
        return response()->json([
            'success' => true,
            'message' => 'List Data Cart',
            'data' => $cart
        ], 200);
    }

    public function transaksi()
    {
        $transaksi = Transaksi::with('detailTransaksi')->where('id_user', Auth::user()->id)->get();
        if (!$transaksi) {
            return response()->json([
                'success' => false,
                'message' => 'Data Transaksi Kosong',
                'data' => ''
            ], 404);
        }
        return response()->json([
            'success' => true,
            'message' => 'List Data Transaksi',
            'data' => $transaksi
        ], 200);
    }

    public function transaksiDetail($id)
    {
        $transaksi = Transaksi::with('detailTransaksi')->where('id', $id)->where('id_user', Auth::user()->id)->first();
        if (!$transaksi) {
            return response()->json([
                'success' => false,
                'message' => 'Data Transaksi Tidak Ditemukan',
                'data' => ''
            ], 404);
        } else {
            return response()->json([
                'success' => true,
                'message' => 'Detail Data Transaksi',
                'data' => $transaksi
            ], 200);
        }
    }
}
