<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    use HasFactory;

    protected $fillable = ['curso_id', 'estudiante_id', 'fecha_inscripcion'];

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class);
    }
}