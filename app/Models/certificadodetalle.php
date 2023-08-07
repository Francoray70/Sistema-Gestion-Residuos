<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class certificadodetalle extends Model
{
    protected $table = 'certifdispfinaldetalle';
    protected $fillable = [
        'corriente', // Agrega aquí otros campos
        // ...
    ];
}
