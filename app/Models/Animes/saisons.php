<?php

namespace App\Models\Animes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class saisons extends Model
{
    use HasFactory;

    public function animes(){
        return $this->belongsTo(animes::class);
    }

    public function episodes(){
        return $this->hasMany(episodes::class);
    }
}
