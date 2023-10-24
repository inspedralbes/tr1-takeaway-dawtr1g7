<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comanda;
use App\Models\Categoria;

class Llibre extends Model
{
    use HasFactory;

    public function categoria() {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function comandes()
    {
        return $this->belongsToMany(Comanda::class);
    }
}
