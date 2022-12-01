<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\Pais;
use App\Models\Localidad;

class DivisionPolitica extends Model
{
    use HasFactory;
    protected $table = 'divisiones_politicas';
    protected $primaryKey = 'division_politica_id';
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
    public function pais()
    {
        return $this->hasOne(Pais::class);
    }
    /* ATRIBUTOS EXTERNOS */

    /* ATRIBUTOS EXTERNOS (inversos)*/
    public function localidades()
    {
        return $this->belongsToMany(Localidad::class);
    }
    /* ATRIBUTOS EXTERNOS (inversos)*/
}
