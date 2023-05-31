<?php

namespace App\Models;


use App\Models\Login;
use App\Models\Locker;
use App\Models\Rental;
use App\Scopes\TenantScope;
use App\Traits\BelongsToTenant;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use BelongsToTenant;
    use TwoFactorAuthenticatable;
  


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded=[];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function places()
    {
        return $this->hasMany('App\Models\Place');
    }

    public function lockers()
{
    return $this->hasMany(Locker::class);
}

    public function bookmarks()
    {
        return $this->belongsToMany('App\Models\Place', 'bookmarks');
    }

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }



    

    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }
    public function hasRole($role)
    {
        return $this->role()->whereName($role)->first() ? true : false;
    }

    public function isAdmin()
    {
        return $this->role == 'Admin';
    }
    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('name', 'like', '%'.$query.'%')
                ->orWhere('email', 'like', '%'.$query.'%');
    }


   
}
