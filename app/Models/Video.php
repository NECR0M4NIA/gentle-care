<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_video';
    protected $fillable = ["titre", "url", "score_min", "socre_max"];
}
