<?php

namespace App\Http\Controllers\Api;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\DetailTransaksi;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function store(Request $request)
    {
        $product = Product::find($request->id_product);
        $cart = Cart::where('id_user', Auth::user()->id)
            ->where('id_product', $request->id_product)
            ->first();

        $stok = Product::find($request->id_product)->stok_awal;

        $jumlah_transaksi_paid = DetailTransaksi::where('id_product', $request->id_product)->whereHas('transaksi', function ($query) {
            $query->where('status_pembayaran', 'paid');
        })->sum('jumlah');

        $jumlah_transaksi_pending = DetailTransaksi::where('id_product', $request->id_product)->whereHas('transaksi', function ($query) {
            $query->where('status_pembayaran', 'pending');
        })->sum('jumlah');

        $jumlah_transaksi = $jumlah_transaksi_paid + $jumlah_transaksi_pending;

        if ($request->jumlah > $stok - $jumlah_transaksi) {
            return response()->json([
                'success' => false,
                'message' => 'Stok produk tidak mencukupi'
            ], 400);
        }


        if ($cart) {
            $cart->jumlah += $request->jumlah;
            $cart->total_harga += $product->harga * $request->jumlah;
            $cart->save();
        } else {
            Cart::create([
                'id_user' => Auth::user()->id,
                'id_product' => $request->id_product,
                'jumlah' => $request->jumlah,
                'total_harga' => $product->harga * $request->jumlah,
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil ditambahkan ke keranjang'
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $cart = Cart::find($id);
        if (!$cart) {
            return response()->json([
                'success' => false,
                'message' => 'Cart not found'
            ], 404);
        }
        $product = Product::find($cart->id_product);

        $stok = Product::find($cart->id_product)->stok_awal;

        $jumlah_transaksi_paid = DetailTransaksi::where('id_product', $product->id)->whereHas('transaksi', function ($query) {
            $query->where('status_pembayaran', 'paid');
        })->sum('jumlah');

        $jumlah_transaksi_pending = DetailTransaksi::where('id_product', $product->id)->whereHas('transaksi', function ($query) {
            $query->where('status_pembayaran', 'pending');
        })->sum('jumlah');

        $jumlah_transaksi = $jumlah_transaksi_paid + $jumlah_transaksi_pending;

        if ($request->jumlah > $stok - $jumlah_transaksi) {
            return response()->json([
                'success' => false,
                'message' => 'Stok produk tidak mencukupi'
            ], 400);
        }

        $cart->jumlah = $request->jumlah;
        $cart->total_harga = $product->harga * $request->jumlah;
        $cart->save();

        return response()->json([
            'success' => true,
            'message' => 'Jumlah produk berhasil diubah'
        ], 200);
    }

    public function checkout()
    {
        $carts = Cart::where('id_user', Auth::user()->id)->get();
        $total = $carts->sum('total_harga');

        foreach ($carts as $cart) {
            $product = Product::find($cart->id_product);

            $stok = Product::find($cart->id_product)->stok_awal;

            $jumlah_transaksi_paid = DetailTransaksi::where('id_product', $cart->id_product)->whereHas('transaksi', function ($query) {
                $query->where('status_pembayaran', 'paid');
            })->sum('jumlah');

            $jumlah_transaksi_pending = DetailTransaksi::where('id_product', $cart->id_product)->whereHas('transaksi', function ($query) {
                $query->where('status_pembayaran', 'pending');
            })->sum('jumlah');

            $jumlah_transaksi = $jumlah_transaksi_paid + $jumlah_transaksi_pending;

            if ($cart->jumlah > $stok - $jumlah_transaksi) {
                return response()->json([
                    'success' => false,
                    'message' => 'Stok produk ' . $product->nama . ' tidak mencukupi'
                ], 400);
            }
        }

        $transaksi = Transaksi::create([
            'id_user' => Auth::user()->id,
            'no_transaksi' => 'TRX' . date('YmdHis'),
            'total_harga' => $total,
            'status_pembayaran' => 'pending',
            'bank' => '',
            'no_va' => '',
            'expired_at' => '',
        ]);

        foreach ($carts as $cart) {
            DetailTransaksi::create([
                'id_transaksi' => $transaksi->id,
                'id_product' => $cart->id_product,
                'jumlah' => $cart->jumlah,
                'total_harga' => $cart->total_harga,
            ]);
        }

        // delete cart
        $delete = Cart::where('id_user', Auth::user()->id)->get();
        foreach ($delete as $del) {
            Cart::destroy($del->id);
        }

        return response()->json([
            'success' => true,
            'message' => 'Transaksi berhasil'
        ], 200);
    }

    public function destroy($id)
    {
        $delete = Cart::destroy($id);
        if (!$delete) {
            return response()->json([
                'success' => false,
                'message' => 'Cart not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil dihapus dari keranjang'
        ], 200);
    }
}
