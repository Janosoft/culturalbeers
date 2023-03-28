<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

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
    public function seguido()
    {
        $follow = Follow::whereFollowableId($this->productor_id)
            ->whereFollowableType(Productor::class)
            ->whereUserId(Auth::user()->user_id)
            ->count() > 0;
        return $follow ?? 0;
    }

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
    public function seguidores()
    {
        return $this->morphMany(Follow::class, 'followable');
    }

    public function seguidores_cantidad(): int
    {
        return $this->morphMany(Follow::class, 'followable')->count();
    }
    
    public function cervezas()
    {
        return $this->hasMany(Cerveza::class, 'productor_id');
    }

    public function imagenes()
    {
        return $this->morphMany(Imagen::class, 'imageable')
            ->where('imagen_id', '!=', $this->imagen_id)
            ->where('ofensiva', false)->orWhere(function ($query) {
                $query->where('ofensiva', true)
                    ->Where('autorizada', true);
            });
    }

    public function comentarios()
    {
        return $this->morphMany(Comentario::class, 'commentable');
    }
    /* ATRIBUTOS EXTERNOS (inversos)*/
}
