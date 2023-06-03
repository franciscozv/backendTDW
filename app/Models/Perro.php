<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perro extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'foto_url', 'descripcion'];

    public function interaccionesComoInteresado()
    {
        return $this->hasMany(Interaccion::class, 'perro_interesado_id');
    }

    public function interaccionesComoCandidato()
    {
        return $this->hasMany(Interaccion::class, 'perro_candidato_id');
    }
}
