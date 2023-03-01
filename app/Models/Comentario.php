<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $table = 'comentarios';

    protected $primaryKey = 'comentario_id';

    protected $guarded = ['created_at', 'updated_at'];

    /* ATRIBUTOS EXTERNOS */
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function commentable()
    {
        return $this->morphTo();
    }
    /* ATRIBUTOS EXTERNOS */
}
