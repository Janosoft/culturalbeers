<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\Productor;
use App\Models\CervezasColor;
use App\Models\CervezasEstilo;
use App\Models\CervezasEnvaseTipo;

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
    /* MUTATORS */

    /* ROUTE NAME */
    public function getRouteKeyName()
    {
        return 'slug';
    }
    /* ROUTE NAME */

    /* ATRIBUTOS EXTERNOS */
    public function productor()
    {
        return $this->belongsTo(Productor::class);
    }

    public function color()
    {
        return $this->belongsTo(CervezasColor::class);
    }

    public function estilo()
    {
        return $this->belongsTo(CervezasEstilo::class);
    }

    public function envase()
    {
        return $this->belongsTo(CervezasEnvaseTipo::class);
    }
    /* ATRIBUTOS EXTERNOS */
}
