<?php

namespace App\Models;

use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categorie extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_categorie';

    protected $fillable = ["nom_categorie"];

    public function questions(): HasMany {
        return $this->hasMany(Question::class, "id_categorie");
    }
}
