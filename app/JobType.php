<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobType extends Model
{
    protected $fillable = ['title_en', 'title_ar', 'deleted'];
}