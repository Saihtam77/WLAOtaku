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
    
    public function episodes(){
        return $this->hasMany(episodes::class);
    }

    public function categories(){
        return $this->belongsToMany(categories::class);
    }
}
