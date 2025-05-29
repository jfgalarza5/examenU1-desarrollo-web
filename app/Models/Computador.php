<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computador extends Model
{
    use HasFactory;

    protected $table = 'computador';

    protected $fillable = [
        'codigo_tienda',
        'almacenamiento',
        'ram',
        'tarjeta_grafica',
        'precio',
        'descripcion',
        'imagen',
        'procesador',
    ];
}
