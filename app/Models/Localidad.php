<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\DivisionPolitica;
use App\Models\Productor;
use App\Models\Persona;

class Localidad extends Model
{
    use HasFactory;
    protected $table = 'localidades';
    protected $primaryKey = 'localidad_id';
    protected $guarded = ['created_at', 'updated_at'];

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

    /* ROUTE NAME */
    public function getRouteKeyName()
    {
        return 'slug';
    }
    /* ROUTE NAME */

    /* ATRIBUTOS EXTERNOS */
    public function division_politica()
    {
        return $this->hasOne(DivisionPolitica::class);
    }
    /* ATRIBUTOS EXTERNOS */

    /* ATRIBUTOS EXTERNOS (inversos)*/
    public function productores()
    {
        return $this->belongsToMany(Productor::class);
    }

    public function personas()
    {
        return $this->belongsToMany(Persona::class);
    }
    /* ATRIBUTOS EXTERNOS (inversos)*/
}
