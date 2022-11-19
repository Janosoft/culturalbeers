<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DivisionesPoliticasTipo extends Model
{
    use HasFactory;
    protected $table = 'divisiones_politicas_tipos';
    protected $primaryKey = 'divisiones_politicas_tipo_id';
}
