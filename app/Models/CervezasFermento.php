<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\CervezasFamilia;

class CervezasFermento extends Model
{
    use HasFactory;
    protected $table = 'cervezas_fermentos';
    protected $primaryKey = 'fermento_id';
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
    public function familias()
    {
        return $this->hasMany(CervezasFamilia::class, 'fermento_id');
    }
    /* ATRIBUTOS EXTERNOS (inversos)*/
}
