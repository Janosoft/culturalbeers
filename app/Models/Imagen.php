<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    use HasFactory;
    protected $table = 'imagenes';
    protected $primaryKey = 'imagen_id';
    protected $guarded = ['created_at', 'updated_at'];

    /* ATRIBUTOS EXTERNOS */
    public function imageable()
    {
        return $this->morphTo();
    }
    /* ATRIBUTOS EXTERNOS */
}
