<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Company extends Authenticatable
{
    protected $fillable = ['name_en', 'name_ar', 'image', 'email', 'password', 'website', 'category_id', 'country_id', 'description_en', 'description_ar', 'phone', 'address', 'facebook', 'twitter', 'linkedin', 'youtube'];
}
