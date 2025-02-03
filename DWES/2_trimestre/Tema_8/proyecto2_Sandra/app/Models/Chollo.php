<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chollo extends Model
{
    use HasFactory;

    protected $fillable = [ 'titulo', 'descripcion', 'url', 'categoria_id', 'puntuacion', 'precio', 'precio_descuento', 'disponible' ];

    public function categoria(){
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
}
