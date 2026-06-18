<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reponse extends Model
{
    protected $fillable = ["id_utilisateur", "id_question", "id_choix"];

    public function utilisateur(): BelongsTo {
        return $this->belongsTo(User::class, "id_utilisateur");
    }

    public function question(): BelongsTo {
        return $this->belongsTo(Question::class, "id_question");
    }

    public function choix(): BelongsTo {
        return $this->belongsTo(Choix::class, "id_choix");
    }
}
