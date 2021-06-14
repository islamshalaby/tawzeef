<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'title_en',
        'title_ar',
        'company_id',
        'views',
        'experience_from',
        'experience_to',
        'job_type',
        'age_from',
        'age_to',
        'salary_from',
        'salary_to',
        'gender',
        'decription_en',
        'decription_ar',
        'english',
        'qualification_id',
        'category_id',
        'image',
        'short_description_en',
        'short_description_ar',
        'deleted'
    ];

    public function company() {
        return $this->belongsTo('App\Company', 'company_id');
    }

    public function type() {
        return $this->belongsTo('App\JobType', 'job_type');
    }

    public function category() {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function qualification() {
        return $this->belongsTo('App\Qualification', 'qualification_id');
    }

    public function requests() {
        return $this->hasMany('App\RequestJob', 'job_id');
    }
}