<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DivisionPolitica extends Model
{
    use HasFactory;
    protected $table = 'divisiones_politicas';
    protected $primaryKey = 'division_politica_id';
}
