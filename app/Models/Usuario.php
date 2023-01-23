<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios';

    protected $primaryKey = 'usuario_id';

    protected $guarded = ['email_verificado', 'activado', 'bloqueado', 'remember_token', 'created_at', 'updated_at'];

    /* MUTATORS */
    protected function email(): Attribute
    {
        return new Attribute(
            set: function ($value) {
                return mb_strtolower($value);
            }
        );
    }

    protected function password(): Attribute
    {
        return new Attribute(
            set: function ($value) {
                return md5($value);
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
    public function persona()
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }
    /* ATRIBUTOS EXTERNOS */
}
