<?php

namespace App\Models;

use App\Http\Resources\BookResource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Artisan;
use Attribute;

class Book extends Model
{
    //define properti yang bisa diisi secara massal
    protected $fillable = [
        'title',
        'author',
        'publisher',
        'year',
    ];

}
