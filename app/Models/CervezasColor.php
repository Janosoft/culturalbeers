<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CervezasColor extends Model
{
    use HasFactory;

    protected $table = 'cervezas_colores';

    protected $primaryKey = 'color_id';

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

    /* ATRIBUTOS EXTERNOS (inversos)*/
    public function cervezas()
    {
        return $this->hasMany(Cerveza::class, 'color_id');
    }
    /* ATRIBUTOS EXTERNOS (inversos)*/
}
