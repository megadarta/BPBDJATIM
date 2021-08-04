<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Element extends Model
{
    protected $table = 'elements';
    protected $fillable  = ['nama_element', 'icon'];
}
