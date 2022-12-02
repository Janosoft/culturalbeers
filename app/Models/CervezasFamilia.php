<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\CervezasFermento;
use App\Models\CervezasEstilo;

class CervezasFamilia extends Model
{
    use HasFactory;
    protected $table = 'cervezas_familias';
    protected $primaryKey = 'familia_id';
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
    public function fermento()
    {
        return $this->belongsTo(CervezasFermento::class, 'fermento_id');
    }
    /* ATRIBUTOS EXTERNOS */

    /* ATRIBUTOS EXTERNOS (inversos)*/
    public function estilos()
    {
        return $this->hasMany(CervezasEstilo::class, 'familia_id');
    }
    /* ATRIBUTOS EXTERNOS (inversos)*/
}
