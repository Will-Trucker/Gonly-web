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
}
