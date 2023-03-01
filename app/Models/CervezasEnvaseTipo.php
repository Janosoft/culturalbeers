<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CervezasEnvaseTipo extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'cervezas_envases_tipos';

    protected $primaryKey = 'envase_id';

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
    /* ATRIBUTOS EXTERNOS */

    /* ATRIBUTOS EXTERNOS (inversos)*/
    public function cervezas()
    {
        return $this->belongsToMany(Cerveza::class, 'cervezas_envases', 'envase_id', 'cerveza_id');
    }
    /* ATRIBUTOS EXTERNOS (inversos)*/
}
