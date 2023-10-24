<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Llibre;


class Categoria extends Model
{
    use HasFactory;

    public function llibres() {
        return $this->hasMany(Llibre::class, 'categoria_id');
    }
}
