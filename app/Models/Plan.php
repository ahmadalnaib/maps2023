<?php

namespace App\Models;

use App\Models\Door;
use App\Models\Locker;
use App\Models\Rental;
use App\Scopes\TenantScope;
use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plan extends Model
{
    use HasFactory,BelongsToTenant ;
    protected $guarded=[];

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }

    public function locker()
    {
        return $this->belongsTo(Locker::class);
    }

    public function doors()
    {
        return $this->belongsToMany(Door::class);
    }
   
}
