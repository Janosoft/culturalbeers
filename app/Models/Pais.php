<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pais extends Model
{
    use HasFactory;
    use SoftDeletes;

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
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function continente()
    {
        return $this->belongsTo(Continente::class, 'continente_id')->withTrashed();
    }

    public function division_politica_tipo()
    {
        return $this->belongsTo(DivisionesPoliticasTipo::class, 'divisiones_politicas_tipo_id')->withTrashed();
    }
    /* ATRIBUTOS EXTERNOS */

    /* ATRIBUTOS EXTERNOS (inversos)*/
    public function divisiones_politicas()
    {
        return $this->hasMany(DivisionPolitica::class, 'pais_id');
    }

    public function imagenes()
    {
        return $this->morphMany(Imagen::class, 'imageable');
    }
    /* ATRIBUTOS EXTERNOS (inversos)*/
}
