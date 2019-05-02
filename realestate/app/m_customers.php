<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class m_customers extends Authenticatable
{
    //
    use Notifiable;
    protected $table = 'm_customers';
    public $timestamps = true;
    
    protected $fillable = [
        'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

     public function m_customers_addresses()
    {
        # code...
        return $this->hasMany('App\m_customers_addresses','customers_id','id');
    }

}
