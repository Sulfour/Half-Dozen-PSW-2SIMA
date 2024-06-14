<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class our_product extends Model
{
    use HasFactory;
    protected $fillable = ['product_name', 'path', 'price', 'description'];
}
