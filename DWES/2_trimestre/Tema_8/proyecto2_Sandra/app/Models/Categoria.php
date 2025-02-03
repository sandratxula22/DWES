<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function chollos(){
        return $this->hasMany(Chollo::class, 'categoria_id');
    }
}
