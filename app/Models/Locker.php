<?php

namespace App\Models;

use App\Models\Door;
use App\Models\User;
use App\Models\Place;
use App\Models\Rental;
use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Locker extends Model
{
    use HasFactory,BelongsToTenant ;
    protected $guarded=[];

    public function place()
{
    return $this->belongsTo(Place::class);
}

public function user()
{
    return $this->belongsTo(User::class);
}

public function doors()
{
    return $this->hasMany(Door::class);
}

public function rentals()
{
    return $this->hasMany(Rental::class);
}


}
