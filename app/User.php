<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'owner_name', 'username', 'email', 'phone', 'address', 'image', 'role_id', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    
    public function products()
    {
        return $this->hasMany('App\Product');
    }


    public function posts()
    {
        return $this->hasMany('App\Post');
    }


    // public static function test($id)
    // {
    //    $name =  User::select('role_id')->where('id',$id)->first();
    //    return $name;
    // }
 

     public static function texandshippingcost($shop_id)
     {

          $shippingcostandtex =  User::where('id',$shop_id)->first();
          return $shippingcostandtex;
     }



}//end class
