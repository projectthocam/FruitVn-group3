<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use SoftDeletes;
    protected $fillable = ['id', 'name', 'Unit_price', 'feature_image_path', 'feature_image_name', 'description', 'category_id', 'views_count'];

    public function images()
    {
        return $this->hasMany(Product_images::class, 'product_id');
    }
    public function Typeproducts()
    {
        return $this->belongsTo(Typeproducts::class, 'category_id');
    }
}
