<?php

namespace App\Models\Animes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class seasonals extends Model
{
    use HasFactory;

    public function animes(){
        return $this->hasMany(animes::class);
    } 
}
