<?php

namespace App;

use App\Category;
use App\ProductImage;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     public function category(){
    	return $this->belongsTo(Category::class);
    }
    public function images(){
    	return $this->hasMany(ProductImage::class);
    }
     public function getFeaturedImageUrlAttribute()
    {
        $featuredImage=$this->images()->where('featured',true)->first();
        if (!$featuredImage)
           $featuredImage=$this->images()->first();
        if ($featuredImage) {
             return $featuredImage->url;
        }
        //devolver img por defecto
        return '/images/default.png';
    }
    public function getCategoryNameAttribute()
    {
        if ($this->category)
            return $this->category->name;
        return 'General';
    }
}
