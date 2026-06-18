<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Resultat extends Model
{
    use HasFactory;

    protected $fillable = ["score_total", "date_resultat", "id_utilisateur"];

    public function utilisateur(): BelongsTo
    {
        return $this->belongsTo(User::class, "id_utilisateur");
    }
}
