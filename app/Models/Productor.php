<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\Localidad;
use App\Models\ProductoresFabricacion;
use App\Models\Cerveza;

class Productor extends Model
{
    use HasFactory;
    protected $table = 'productores';
    protected $primaryKey = 'productor_id';
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
    public function localidad()
    {
        return $this->hasOne(Localidad::class);
    }

    public function fabricacion()
    {
        return $this->hasOne(ProductoresFabricacion::class);
    }
    /* ATRIBUTOS EXTERNOS */

    /* ATRIBUTOS EXTERNOS (inversos)*/
    public function cervezas()
    {
        return $this->hasMany(Cerveza::class);
    }
    /* ATRIBUTOS EXTERNOS (inversos)*/
}
