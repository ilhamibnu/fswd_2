<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $kategori = Category::all();
        return view('admin.pages.data-kategori', [
            'kategori' => $kategori
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ], [
            'name.required' => 'Nama kategori harus diisi'
        ]);

        $kategori = new Category();
        $kategori->name = $request->name;
        $kategori->save();

        return redirect()->back()->with('store', 'Kategori berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ], [
            'name.required' => 'Nama kategori harus diisi'
        ]);

        $kategori = Category::find($id);
        $kategori->name = $request->name;
        $kategori->save();

        return redirect()->back()->with('update', 'Kategori berhasil diubah');
    }

    public function destroy($id)
    {
        $cek_product = Product::where('id_category', $id)->count();

        if ($cek_product > 0) {
            return redirect()->back()->with('fail', 'Kategori tidak bisa dihapus karena masih memiliki produk');
        }

        $kategori = Category::find($id);
        $kategori->delete();

        return redirect()->back()->with('destroy', 'Kategori berhasil dihapus');
    }
}
