<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Bantuan extends Model
{
    use HasFactory;
    protected $table = 'bantuan';
    protected $primaryKey = 'id';

    protected $fillable = [
        'bencana_id', 
        'user_id', 
        'element_id', 
        'kuantitas',
    ];
}