<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
    use HasFactory;

    public function bencana(){
        return $this->belongsToMany(Bencana::class, 'bantuan');
    }

    public function user(){
        return $this->belongsToMany(User::class, 'bantuan');
    }
}
