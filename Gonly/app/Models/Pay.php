<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pay extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $primaryKey = 'id';
   
    public $timestamps = false;
    
    protected $fillable = ['cliente', 'correo', 'direccion','tarjeta','caducidad','cvc', 'total'];
}
