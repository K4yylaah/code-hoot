<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;

    protected $fillable = [
        'score',
        'quiz_completes',
        'quiz_id',
        'user_id',
    ];

    protected $casts = [
        'quiz_completes' => 'boolean',
    ];
}
