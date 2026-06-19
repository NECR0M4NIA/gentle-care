<?php

namespace App\Models;

use App\Models\Choix;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Question extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_question';

    protected $fillable = ["titre_question", "ordre", "id_questionnaire", "id_categorie"];

    public function categorie(): BelongsTo
    {
        return $this->belongsTo(Categorie::class, 'id_categorie', 'id_categorie');
    }

    public function questionnaire(): BelongsTo
    {
        return $this->belongsTo(Questionnaire::class, 'id_questionnaire', 'id_questionnaire');
    }

    public function choix(): HasMany
    {
        return $this->hasMany(Choix::class, 'id_question', 'id_question');
    }
}
