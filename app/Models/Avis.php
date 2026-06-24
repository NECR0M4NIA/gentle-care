<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Avis extends Model
{
    protected $table = 'avis';

    protected $fillable = [
        'utilisateur_id',
        'note',
        'commentaire',
    ];

    public function utilisateur()
    {
        return $this->belongsTo(User::class, 'utilisateur_id');
    }
}