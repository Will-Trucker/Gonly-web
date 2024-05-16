<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
Use App\Models\User;

class Pay extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'user_id',
        'cliente',
        'correo',
        'direccion',
        'tarjeta',
        'caducidad',
        'cvc',
        'total',
        'status',
        'subtotal',
        'shipping'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // Establecer la relación con el campo user_id
    }
}
