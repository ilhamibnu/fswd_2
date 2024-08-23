<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';

    protected $fillable = [
        'name',
        'harga',
        'image',
        'deskripsi',
        'stok_awal',
        'id_category',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }

    public function cart()
    {
        return $this->hasMany(Cart::class, 'id_product');
    }

    public function detail_transaksi()
    {
        return $this->hasMany(DetailTransaksi::class, 'id_product');
    }
}
