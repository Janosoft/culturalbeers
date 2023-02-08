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

    /**
     * Indica el porcentaje completo del perfil del usuario. En caso de ser 100 no se debería mostrar la barra de estado
     * 
     * @return int Porcentaje Completo
     */
    public function porcentajeBarraEstado(): int
    {
        $cantCompleta = 0;
        $cantIncompleta = 0;

        if (!$this->email_verificado) $cantIncompleta++;
        else $cantCompleta++;
        if (empty($this->persona->imagen)) $cantIncompleta++;
        else $cantCompleta++;
        if (empty($this->persona->profesion)) $cantIncompleta++;
        else $cantCompleta++;

        return round(($cantCompleta / ($cantCompleta + $cantIncompleta) * 100));
    }

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
