<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\Continente;
use App\Models\DivisionesPoliticasTipo;
use App\Models\DivisionPolitica;


class Pais extends Model
{
    use HasFactory;
    protected $table = 'paises';
    protected $primaryKey = 'pais_id';
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
    public function continente()
    {
        return $this->hasOne(Continente::class);
    }

    public function division_politica_tipo()
    {
        return $this->hasOne(DivisionesPoliticasTipo::class);
    }
    /* ATRIBUTOS EXTERNOS */

    /* ATRIBUTOS EXTERNOS (inversos)*/
    public function divisiones_politicas()
    {
        return $this->belongsToMany(DivisionPolitica::class);
    }
    /* ATRIBUTOS EXTERNOS (inversos)*/
}
