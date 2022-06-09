<?php

namespace App\Models\Animes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class animes extends Model
{
    use HasFactory;

    public function seasonals(){
        return $this->belongsTo(seasonals::class);
    } 
    
    public function saison(){
        return $this->hasMany(saisons::class);
    }

    public function categories(){
        return $this->hasMany(categories::class);
    }
}
