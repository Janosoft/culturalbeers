<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class CervezasEnvaseTipo extends Model
{
    use HasFactory;
    protected $table = 'cervezas_envases_tipos';
    protected $primaryKey = 'envase_id';
    protected $fillable = ['nombre'];

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
