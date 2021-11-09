<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Typeproducts extends Model
{
    use SoftDeletes;
    protected $fillable = ['id', 'name', 'parent_id', 'slug'];

    public function categoryChildrent(){
        return $this->hasMany(Typeproducts::class,'parent_id');
    }

    public function products(){
        return $this->hasMany(Products::class,'category_id');
    }
}
