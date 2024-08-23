<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $kategori = Category::all();
        $product = Product::with('category')->get();
        return view('admin.pages.data-product', [
            'product' => $product,
            'kategori' => $kategori,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'id_category' => 'required',
            'harga' => 'required',
            'image' => 'required',
            'deskripsi' => 'required',
            'stok_awal' => 'required',
        ], [
            'name.required' => 'Nama produk harus diisi',
            'id_category.required' => 'Kategori harus dipilih',
            'harga.required' => 'Harga harus diisi',
            'image.required' => 'Gambar harus diisi',
            'deskripsi.required' => 'Deskripsi harus diisi',
            'stok_awal.required' => 'Stok awal harus diisi',
        ]);

        // insert image
        $image = $request->file('image');
        $image_name = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('product'), $image_name);

        $product = new Product();
        $product->name = $request->name;
        $product->id_category = $request->id_category;
        $product->harga = $request->harga;
        $product->image = $image_name;
        $product->deskripsi = $request->deskripsi;
        $product->stok_awal = $request->stok_awal;
        $product->save();

        return redirect()->back()->with('store', 'Produk berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'id_category' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'stok_awal' => 'required',
        ], [
            'name.required' => 'Nama produk harus diisi',
            'id_category.required' => 'Kategori harus dipilih',
            'harga.required' => 'Harga harus diisi',
            'deskripsi.required' => 'Deskripsi harus diisi',
            'stok_awal.required' => 'Stok awal harus diisi',
        ]);

        $product = Product::find($id);

        if ($request->hasFile('image')) {
            // delete old image
            $old_image = public_path('product/' . $product->image);
            if (file_exists($old_image) != null) {
                unlink($old_image);
            }

            // insert image
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('product'), $image_name);

            $product->image = $image_name;
        }

        $product->name = $request->name;
        $product->id_category = $request->id_category;
        $product->harga = $request->harga;
        $product->deskripsi = $request->deskripsi;
        $product->stok_awal = $request->stok_awal;
        $product->save();

        return redirect()->back()->with('update', 'Produk berhasil diubah');
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        $cek_cart = $product->cart->count();
        if ($cek_cart > 0) {
            return redirect()->back()->with('failcart', 'Produk tidak bisa dihapus karena masih ada di keranjang');
        }

        $cek_detail_transaksi = $product->detail_transaksi->count();
        if ($cek_detail_transaksi > 0) {
            return redirect()->back()->with('failtransaksi', 'Produk tidak bisa dihapus karena masih ada di detail transaksi');
        }

        // delete image
        $old_image = public_path('product/' . $product->image);
        if (file_exists($old_image)) {
            unlink($old_image);
        }

        $product->delete();

        return redirect()->back()->with('destroy', 'Produk berhasil dihapus');
    }
}
