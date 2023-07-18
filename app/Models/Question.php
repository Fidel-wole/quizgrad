<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'questions',
        'option_a',
        'option_b',
        'option_c',
        'option_d',
        'answer',
        'subjectId',
    
    ];
    public function category(){
        return $this->belongsTo(Quiz_topics::class, 'subjectId');
    }
}
