<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;

    protected $table = 'follows';

    protected $primaryKey = 'follow_id';

    protected $guarded = ['created_at', 'updated_at'];

    /* ATRIBUTOS EXTERNOS */
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function followable()
    {
        return $this->morphTo();
    }
    /* ATRIBUTOS EXTERNOS */
}
