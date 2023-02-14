<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{
    use HasFactory;

    protected $table = 'localidades';

    protected $primaryKey = 'localidad_id';

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

    public static function getByName(string $nombre)
    {
        return Localidad::where('nombre', $nombre)->first();
    }

    /* ROUTE NAME */
    public function getRouteKeyName()
    {
        return 'slug';
    }
    /* ROUTE NAME */

    /* ATRIBUTOS EXTERNOS */
    public function division_politica()
    {
        return $this->belongsTo(DivisionPolitica::class, 'division_politica_id');
    }
    /* ATRIBUTOS EXTERNOS */

    /* ATRIBUTOS EXTERNOS (inversos)*/
    public function productores()
    {
        return $this->hasMany(Productor::class, 'localidad_id');
    }

    public function comentarios()
    {
        return $this->morphMany(Comentario::class, 'commentable');
    }
    /* ATRIBUTOS EXTERNOS (inversos)*/
}
