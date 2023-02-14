<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return $this->belongsTo(Pais::class, 'pais_id');
    }
    /* ATRIBUTOS EXTERNOS */

    /* ATRIBUTOS EXTERNOS (inversos)*/
    public function localidades()
    {
        return $this->hasMany(Localidad::class, 'division_politica_id');
    }
    /* ATRIBUTOS EXTERNOS (inversos)*/
}
