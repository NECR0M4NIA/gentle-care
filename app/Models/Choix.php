<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Choix extends Model
{
    use HasFactory;

    protected $fillable = array("titre_choix", "valeur_score");

    public function getQuestions(): HasMany {
        return $this->hasMany(Questions::class);
    }

    public function getUsers(): BelongsToMany {
        return $this->belongsToMany(User::class);
    }
}
