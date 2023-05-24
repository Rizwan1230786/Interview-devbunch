<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductGallary extends Model
{
    use HasFactory;
    protected $fillable=['gallary_image','product_id'];
}
