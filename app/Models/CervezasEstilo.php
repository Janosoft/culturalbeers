<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\CervezasFamilia;
use App\Models\Cerveza;

class CervezasEstilo extends Model
{
    use HasFactory;
    protected $table = 'cervezas_estilos';
    protected $primaryKey = 'estilo_id';
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
    public function familia()
    {
        return $this->hasOne(CervezasFamilia::class);
    }
    /* ATRIBUTOS EXTERNOS */

    /* ATRIBUTOS EXTERNOS (inversos)*/
    public function cervezas()
    {
        return $this->belongsToMany(Cerveza::class);
    }
    /* ATRIBUTOS EXTERNOS (inversos)*/
}
