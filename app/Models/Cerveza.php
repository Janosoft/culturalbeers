<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cerveza extends Model
{
    use HasFactory;

    protected $table = 'cervezas';

    protected $primaryKey = 'cerveza_id';

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

    protected function IBU(): Attribute
    {
        return new Attribute(
            set: function ($value) {
                if ($value > 100) {
                    $value = 100;
                }
                if ($value < 0) {
                    $value = 0;
                }

                return $value;
            }
        );
    }

    protected function ABV(): Attribute
    {
        return new Attribute(
            get: fn ($value) => "{$value}",
            set: function ($value) {
                if ($value > 100) {
                    $value = 100;
                }
                if ($value < 0) {
                    $value = 0;
                }

                return $value;
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
    public function imagen()
    {
        return $this->belongsTo(Imagen::class, 'imagen_id');
    }

    public function productor()
    {
        return $this->belongsTo(Productor::class, 'productor_id');
    }

    public function color()
    {
        return $this->belongsTo(CervezasColor::class, 'color_id');
    }

    public function estilo()
    {
        return $this->belongsTo(CervezasEstilo::class, 'estilo_id');
    }

    public function envases()
    {
        return $this->belongsToMany(CervezasEnvaseTipo::class, 'cervezas_envases', 'cerveza_id', 'envase_id');
    }
    /* ATRIBUTOS EXTERNOS */

    /* ATRIBUTOS EXTERNOS (inversos)*/
    public function imagenes()
    {
        return $this->morphMany(Imagen::class, 'imageable')->where('imagen_id', '!=' , $this->imagen_id);
    }

    public function comentarios()
    {
        return $this->morphMany(Comentario::class, 'commentable')->where('ofensivo', false)->orWhere(function ($query) {
            $query->where('ofensivo', true)
                ->Where('autorizado', true);
        });
    }

    public function cervezasMismoEstilo()
    {
        $cervezas = Cerveza::inRandomOrder()
            ->where('estilo_id', $this->estilo_id)
            ->where('cerveza_id', '!=', $this->cerveza_id)
            ->limit(4)
            ->get();

        return $cervezas;
    }

    public function cervezasMismoProductor()
    {
        $cervezas = Cerveza::inRandomOrder()
            ->where('productor_id', $this->productor_id)
            ->where('cerveza_id', '!=', $this->cerveza_id)
            ->limit(4)
            ->get();

        return $cervezas;
    }

    /* ATRIBUTOS EXTERNOS (inversos)*/
}
