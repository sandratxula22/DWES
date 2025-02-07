<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'salario',
        'tipo_contrato',
        'fecha_cierre',
        'empresa_id',
    ];

    public function empresas(){
        return $this->belongsTo(Empresa::class, 'empresa_id');
    }
}
