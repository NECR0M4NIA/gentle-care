<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    use HasFactory;

    protected $fillable = array("titre_question", "ordre");

    public function getQuestionnaire(): BelongsToMany {
        return $this->belongsToMany(Questionnaire::class);
    }       
}
