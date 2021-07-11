<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function books(){
        return  $this->hasMany(Book::class, 'user_id','id');
      }


   public function roles(){
      return $this->belongsToMany(Role::class);
   }   

   
   public function hasPermissions($permission){
    foreach($this->roles as $role){
    if (in_array($permission,$role->permissions)) {
        
        return true;
    }
}
    return abort(403,'انت مش مدير يا كلب');
}

}
