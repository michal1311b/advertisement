<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
<<<<<<< HEAD
use NotificationChannels\WebPush\HasPushSubscriptions;

class User extends Authenticatable
{
    use Notifiable;
    use HasPushSubscriptions;
=======

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
>>>>>>> bc873478dff7e481546a5007b9d26a7222a94c2f

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
<<<<<<< HEAD
        'password', 'remember_token',
=======
        'provider_name', 'provider_id', 'password', 'remember_token',
>>>>>>> bc873478dff7e481546a5007b9d26a7222a94c2f
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

<<<<<<< HEAD
    public function messages()
    {
        return $this->hasMany(Message::class);
=======
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function advertisements()
    {
        return $this->hasMany(Advertisement::class);
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function followers() 
    {
        return $this->belongsToMany(self::class, 'followers', 'follows_id', 'advertisement_id')
                    ->withTimestamps();
    }

    public function follows() 
    {
        return $this->belongsToMany(self::class, 'followers', 'advertisement_id', 'follows_id')
                    ->withTimestamps();
    }

    public function follow($userId) 
    {
        $this->follows()->attach($userId);
        return $this;
    }

    public function unfollow($userId)
    {
        $this->follows()->detach($userId);
        return $this;
    }

    public function isFollowing($userId) 
    {
        return (boolean) $this->follows()->where('follows_id', $userId)->first();
    }

    /**
    * @param string|array $roles
    */
    public function authorizeRoles($roles)
    {
        if (is_array($roles)) {
            return $this->hasAnyRole($roles) || 
                    abort(401, 'This action is unauthorized.');
        }
            return $this->hasRole($roles) || 
                abort(401, 'This action is unauthorized.');
    }

    public function checkAuthorization($user, $advertUser)
    {
        if($user === $advertUser) {
            return true;
        }
        else {
            return abort(401, 'You don\'t have access to this site.');
        }
    }

    /**
    * Check multiple roles
    * @param array $roles
    */
    public function hasAnyRole($roles)
    {
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }
    /**
    * Check one role
    * @param string $role
    */
    public function hasRole($role)
    {
        return null !== $this->roles()->where('name', $role)->first();
>>>>>>> bc873478dff7e481546a5007b9d26a7222a94c2f
    }
}
