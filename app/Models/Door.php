<?php

namespace App\Models;

use App\Models\Plan;
use App\Models\Locker;
use App\Models\Rental;
use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Door extends Model
{
    use HasFactory,HasUuids,BelongsToTenant ;
    protected $guarded=[];
    public function locker()
{
    return $this->belongsTo(Locker::class);
}

public function rentals()
    {
        return $this->hasMany(Rental::class);
    }

    public function isAvailable()
    {
        return $this->rental_status === 'available';
    }

    public function plans()
    {
        return $this->belongsToMany(Plan::class, 'door_plans');
    }

}
