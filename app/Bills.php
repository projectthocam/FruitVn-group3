<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bills extends Model
{
    protected $fillable = ['id', 'name', 'email', 'phone', 'address', 'product_id', 'quantity', 'quantity', 'price', 'size'];
}
