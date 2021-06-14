<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebsiteAd extends Model
{
    protected $fillable = ['image', 'content', 'place'  // 1 => home
                                                        // 2 => jobs
    ];
}