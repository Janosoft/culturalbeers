<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lugar extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'lugares';

    protected $primaryKey = 'lugar_id';

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
        return $this->belongsTo(Localidad::class, 'localidad_id')->withTrashed();
    }

    public function imagenes()
    {
        return $this->morphMany(Imagen::class, 'imageable');
    }

    public function comentarios()
    {
        return $this->morphMany(Comentario::class, 'commentable');
    }
    /* ATRIBUTOS EXTERNOS */
}
