<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Artisan;
use Attribute;

class Product extends Model
{
    //define properti yang bisa diisi secara massal
    protected $fillable = [
        'image', 
        'title',
        'description',
        'price',
        'stock',
    ];

    //method untuk mengubah path gambar menjadi URL lengkap
    protected function image(): Attribute{
        return Attribute::make(
            get: fn ($image) => url('/storage/product' .$image),
        );
    }
}
