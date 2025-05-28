<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computador extends Model
{
    use HasFactory;

    // Laravel infiere que la tabla se llama "computadors", pero la nuestra es "computador"
    protected $table = 'computador';

    // Si no usas campos de tiempo automáticos, puedes desactivarlos:
    // public $timestamps = false;

    protected $fillable = [
        'marca',
        'modelo',
        'precio',
        'fecha_compra',
        'en_uso',
    ];
}
