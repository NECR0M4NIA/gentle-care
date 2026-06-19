<?php

namespace App\Models;

use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Questionnaire extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_questionnaire';

    protected $fillable = ["titre_questionnaire"];

    public function questions(): HasMany {
        return $this->hasMany(Question::class, "id_questionnaire");
    }
}
