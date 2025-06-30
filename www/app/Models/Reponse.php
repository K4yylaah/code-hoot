<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reponse extends Model
{
    use HasFactory;

    protected $fillable = [
        'contenu',
        'est_correcte',
        'question_id',
    ];

    protected $casts = [
        'est_correcte' => 'boolean',
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
