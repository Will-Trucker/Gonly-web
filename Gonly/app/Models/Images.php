<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;
    protected $fillable = ['url', 'products_user_id'];

    protected $table = 'images_product';

    public function products_user(){
        return $this->belongsTo('App\Models\Products_user');
    }
    
}
