<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz_category extends Model
{
    use HasFactory;
    protected $fillable = [
        'categories'];
    
        public function topics() {
            return $this->hasMany(Quiz_topics::class, 'category_id');
        }
}
