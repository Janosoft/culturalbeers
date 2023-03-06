<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Productor extends Model
{
    use HasFactory;
    use SoftDeletes;

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
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function localidad()
    {
        return $this->belongsTo(Localidad::class, 'localidad_id')->withTrashed();
    }

    public function fabricacion()
    {
        return $this->belongsTo(ProductoresFabricacion::class, 'fabricacion_id')->withTrashed();
    }
    /* ATRIBUTOS EXTERNOS */

    /* ATRIBUTOS EXTERNOS (inversos)*/
    public function cervezas()
    {
        return $this->hasMany(Cerveza::class, 'productor_id');
    }

    public function imagenes()
    {
        return $this->morphMany(Imagen::class, 'imageable');
    }

    public function comentarios()
    {
        return $this->morphMany(Comentario::class, 'commentable');
    }
    /* ATRIBUTOS EXTERNOS (inversos)*/
}
