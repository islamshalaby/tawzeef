<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestJob extends Model
{
    protected $fillable = [
        'job_id',
        'user_id',
        'status'    // 1 => applied
                    // 2 => accepted
                    // 3 => rejected
        ];

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }
}