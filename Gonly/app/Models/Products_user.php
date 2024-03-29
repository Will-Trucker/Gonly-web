<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products_user extends Model
{
    use HasFactory;
    public $table = "products_user";

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function images_product(){
        return $this->hasMany('App\Models\Images');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relación con la subcategoría
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
}
