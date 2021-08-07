<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Bencana extends Model
{
    use HasFactory;
    protected $table = 'bencanas';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_bencana', 
        'tanggal', 
        'latitude', 
        'longitude',
        'lokasi',
        'status_bencana',
    ];
}
