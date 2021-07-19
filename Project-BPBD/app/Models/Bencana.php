<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bencana extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsToMany(User::class, 'bantuan');
    }

    public function elements(){
        return $this->belongsToMany(Element::class, 'bantuan');
    }    
}
