<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::with('user')->get();
        return view('admin.pages.data-transaksi', [
            'transaksi' => $transaksi
        ]);
    }
}
