<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Localidad extends Model
{
    use HasFactory;
    protected $table = 'localidades';
    protected $primaryKey = 'localidad_id';
    protected $fillable = ['nombre', 'division_politica_id'];

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
