<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Lab404\AuthChecker\Models\HasLoginsAndDevices;
use Lab404\AuthChecker\Interfaces\HasLoginsAndDevicesInterface;

class User extends Authenticatable implements MustVerifyEmail, HasLoginsAndDevicesInterface
{
    use Notifiable, HasLoginsAndDevices; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'term1', 'term2', 'term3', 'avatar', 'banned_until'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'provider_name', 'provider_id', 'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dates = [
        'banned_until'
    ];

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

    public function preference()
    {
        return $this->hasOne(Preference::class);
    }

    public function doctor()
    {
        return $this->hasOne(Doctor::class);
    }

    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function specializations()
    {
        return $this->belongsToMany(Specialization::class)
        ->withPivot('is_pending')
        ->withTimestamps();
    }

    public function finishedSpecializations()
    {
        return $this->belongsToMany(Specialization::class)
        ->wherePivot('is_pending', false)
        ->withTimestamps();
    }

    public function pendingSpecializations()
    {
        return $this->belongsToMany(Specialization::class)
        ->wherePivot('is_pending', true)
        ->withTimestamps();
    }

    public function languages()
    {
        return $this->belongsToMany(Language::class)->withPivot('level');
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
        if($user === $advertUser || Auth::user()->authorizeRoles(['admin'])) {
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
    }

    /**
     * Return the user's posts
     */
    public function posts()
    {
        return $this->hasMany(Post::class, 'author_id');
    }

     /**
     * Return the user's comments
     */
    public function comments()
    {
        return $this->hasMany(Comment::class, 'author_id');
    }
}
