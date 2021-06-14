<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['image', 'title_en', 'title_ar', 'deleted'];

    public function exam($userId) {
        return $this->hasOne('App\UserExam', 'category_id')->where('user_id', $userId)->first();
    }
}
