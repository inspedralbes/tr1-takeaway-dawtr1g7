<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Llibre;

class Comanda extends Model
{
    use HasFactory;

    public function llibres()
    {
        return $this->belongsToMany(Llibre::class, 'llibre_comanda')->withPivot('quantitat', 'preu');
    }
}
