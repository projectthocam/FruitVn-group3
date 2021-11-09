<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_images extends Model
{
    protected $fillable = ['id', 'img_path', 'img_name', 'product_id'];
}
