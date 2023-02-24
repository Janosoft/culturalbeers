<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LugaresCategoria extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'lugares_categorias';

    protected $primaryKey = 'categoria_id';

    protected $guarded = ['created_at', 'updated_at', 'deleted_at'];

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
    public function lugares()
    {
        return $this->hasMany(Lugar::class, 'categoria_id');
    }
    /* ATRIBUTOS EXTERNOS (inversos)*/
}