<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Cerveza extends Model
{
    use HasFactory;
    protected $table = 'cervezas';
    protected $primaryKey = 'cerveza_id';
    protected $fillable = ['nombre', 'productor_id', 'color_id', 'estilo_id', 'envase_id'];

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
