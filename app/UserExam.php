<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserExam extends Model
{
    protected $fillable = ['user_id', 'category_id', 'percentage', 'step', 'result', 'completed', 'question'];

    public function category() {
        return $this->belongsTo('App\Category', 'category_id');
    }
}