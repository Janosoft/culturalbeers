<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Usuario extends Model
{
    use HasFactory;
    protected $table = 'usuarios';
    protected $primaryKey = 'usuario_id';

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
}
