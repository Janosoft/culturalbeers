<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    protected $primaryKey = 'user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'apellido',
        'localidad_id',
        'email',
        'slug',
        'password',
        'imagen_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /* MUTATORS */
    protected function nombre(): Attribute
    {
        return new Attribute(
            set: function ($value) {
                return ucwords($value);
            }
        );
    }

    protected function apellido(): Attribute
    {
        return new Attribute(
            set: function ($value) {
                return ucwords($value);
            }
        );
    }

    protected function email(): Attribute
    {
        return new Attribute(
            set: function ($value) {
                return mb_strtolower($value);
            }
        );
    }

    public function nya(): String
    {
        return "{$this->nombre} {$this->apellido}";
    }
    /* MUTATORS */

    /* ROUTE NAME */
    public function getRouteKeyName()
    {
        return 'slug';
    }
    /* ROUTE NAME */

    /* ATRIBUTOS EXTERNOS */
    public function localidad()
    {
        return $this->belongsTo(Localidad::class, 'localidad_id')->withTrashed();
    }

    public function imagen()
    {
        return $this->belongsTo(Imagen::class, 'imagen_id');
    }

    public function cervezas_probadas(): BelongsToMany
    {
        return $this->belongsToMany(Cerveza::class, 'cervezas_probadas', 'user_id', 'cerveza_id');
    }

    public function cervezas_puntuadas(): BelongsToMany
    {
        return $this->belongsToMany(Cerveza::class, 'puntajes', 'user_id', 'puntuable_id')->wherePivot('puntuable_type', Cerveza::class);
    }
    /* ATRIBUTOS EXTERNOS */
}
