<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Productor extends Model
{
    use HasFactory;
    protected $table = 'productores';
    protected $primaryKey = 'productor_id';
    protected $fillable = ['nombre', 'fabricacion_id', 'localidad_origen'];

    /* MUTATORS */
    protected function nombre(): Attribute
    {
        return new Attribute(
            set: function ($value) {
                return ucwords($value);
            }
        );
    }
    /* MUTATORS */
}
