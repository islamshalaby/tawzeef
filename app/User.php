<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $fillable = ['name', 'email', 'password', 'phone', 'category_id', 'image', 'step', 'birth_date', 'gender', 'nationality', 'residence', 'marital_status', 'salary', 'driving_license', 'localId'];


    // public function getAuthIdentifierName() {
    //     return 'localId';
    //  }
    //  public function getAuthIdentifier(){
    //     return $this->localId;
    //  }

    public function requests() {
        return $this->belongsToMany('App\Job', 'request_jobs', 'user_id','job_id');
    }

    public function exams() {
        return $this->belongsToMany('App\Category', 'user_exams', 'user_id', 'category_id');
    }

    // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}