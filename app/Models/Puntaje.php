<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puntaje extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'puntajes';

    protected $primaryKey = 'puntaje_id';

    protected $fillable = ['puntaje','puntuable_type','puntuable_id','user_id'];

    /* ATRIBUTOS EXTERNOS */
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'user_id');
    }

    public function puntuable()
    {
        return $this->morphTo();
    }
    /* ATRIBUTOS EXTERNOS */
}
