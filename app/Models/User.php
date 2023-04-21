<?php

namespace App\Models;


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

class User extends Authenticatable
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
    protected $fillable = [
        'name', 'email', 'password',
    ];

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

    public function bookmarks()
    {
        return $this->belongsToMany('App\Models\Place', 'bookmarks');
    }

    public function alreadyBookmarked($place)
    {
        return $this->bookmarks()->wherePlace_id($place)->exists();
    }

    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }
    public function hasRole($role)
    {
        return $this->role()->whereName($role)->first() ? true : false;
    }


   
}
