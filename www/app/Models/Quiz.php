<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_de_questions',
        'difficulté',
        'catégorie',
    ];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
