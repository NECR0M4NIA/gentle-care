<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Choix extends Model
{
    use HasFactory;

    protected $fillable = ["nom_choix", "valeur_choix", "id_question"];

    public function question(): BelongsTo {
        return $this->belongsTo(Question::class, "id_question");
    }
}
