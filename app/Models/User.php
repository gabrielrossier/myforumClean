<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pseudo',
        'first_name',
        'last_name',
        'email',
        'password',
        'role_id'
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

    /**
     * Tells if that user is an admin or not
     * @return bool
     */
    public function isAdmin()
    {
        if($this->roles()->where('slug','ADMI')->first() != null)
        {
            return true;
        }
        return false;
    }

    /**
     *
     */
    public static function admins()
    {
       return User::whereHas('roles', function($q) {
           $q->where('slug','ADMI');
       })->get();
    }

    /**
     * Changes the role of the user
     * We can use a toggle as long as our policy remains that a demoted admin becomes a student
     */
    public function toggleRole($roleName)
    {

        if($this->roles()->where('slug',$roleName)->first() != null )
        {
            $this->roles()->where('slug',$roleName)->detach(Role::where('slug',$roleName)->first());
        }
        else{
            $this->roles()->attach(Role::where('slug',$roleName)->first());
        }
        $this->save();
    }

    // ============= Relationships

    public function opinions()
    {
        return $this->hasMany(Opinion::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

}
