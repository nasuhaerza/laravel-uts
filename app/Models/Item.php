<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;

    protected $primaryKey = 'id'; // use id as PK
    public $incrementing = true; // auto increment
    protected $fillable = ['kd_barang', 'nama_barang', 'kategori', 'stok', 'harga'];
}
