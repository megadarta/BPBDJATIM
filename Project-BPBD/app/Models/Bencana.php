<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Bencana extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsToMany(User::class, 'bantuan');
    }

    public function elements(){
        return $this->belongsToMany(Element::class, 'bantuan');
    }    

    public function allData(){
        $results = DB::table('bencanas')
        ->select('nama_bencana', 'tanggal', 'latitude', 'longitude', 'lokasi')
        ->get();
        return $results;
    }
}
