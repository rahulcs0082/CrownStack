<?php

namespace CrownStack\CameraStore\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Customer extends Authenticatable implements JWTSubject
{
    use Notifiable;
    
    /**
     * The table associated with the model.
     *
     * @var string
    */
    protected $table = 'customers';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
    */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'gender',
        'date_of_birth',
        'phone',
        'password',
        'status',
    ];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

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
