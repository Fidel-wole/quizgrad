<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz_topics extends Model
{
    use HasFactory;
    protected $fillable = [
        'subject',
        'topics',
        'user_id',
        'category_id',
        'subjectId'
    ];
    public function toSearchableArray(){
        return[
            'subject'=>$this->subject,
        'topics'=>$this->topics
        ];
    }
    public function category(){
        return $this->belongsTo(Quiz_category::class, 'category_id');
    }
    public function quest(){
        return $this->hasMany(Question::class, 'subjectId');
    }
}
