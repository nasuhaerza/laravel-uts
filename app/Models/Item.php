<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// class Item extends Model
// {
//     use HasFactory;

//     protected $primaryKey = 'id'; // use id as PK
//     public $incrementing = true; // auto increment
//     protected $fillable = ['kode', 'nama', 'kategori', 'stok', 'harga','user_id'];
// }

class Item extends Model
{
    protected $table = 'items';

    protected $fillable = [
        'kode',
        'nama',
        'kategori',
        'stok',
        'harga'
    ];
}
