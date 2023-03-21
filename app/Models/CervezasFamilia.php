<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CervezasFamilia extends Model
{
    use HasFactory;
    use SoftDeletes;

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

    protected function descripcion(): Attribute
    {
        return new Attribute(
            set: function ($value) {
                return ucfirst($value);
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

    public function fermento()
    {
        return $this->belongsTo(CervezasFermento::class, 'fermento_id')->withTrashed();
    }
    /* ATRIBUTOS EXTERNOS */

    /* ATRIBUTOS EXTERNOS (inversos)*/
    public function estilos()
    {
        return $this->hasMany(CervezasEstilo::class, 'familia_id');
    }

    public function comentarios()
    {
        return $this->morphMany(Comentario::class, 'commentable');
    }
    /* ATRIBUTOS EXTERNOS (inversos)*/
}
