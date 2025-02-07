<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'sector',
        'ubicacion',
    ];

    public function ofertas(){
        return $this->hasMany(Oferta::class, 'empresa_id');
    }
}
