<?php

namespace App\Models\Animes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class episodes extends Model
{
    use HasFactory;

    public function saisons(){
        return $this->belongsTo(saisons::class);
    }
}
