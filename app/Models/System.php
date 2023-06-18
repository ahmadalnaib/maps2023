<?php

namespace App\Models;

use App\Models\Box;
use App\Models\Place;
use Ramsey\Uuid\Uuid;
use App\Models\Rental;
use App\Scopes\TenantScope;
use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class System extends Model
{
    use HasFactory,BelongsToTenant ;
    protected $guarded=[];


    protected static function booted()
    {
        static::creating(function ($system) {
            $system->uuid = Uuid::uuid4()->toString();
        });
    }
    public function boxes()
    {
        return $this->hasMany(Box::class);
    }

    public function rentals()
{
    return $this->hasMany(Rental::class);
}

public function place()
{
    return $this->belongsTo(Place::class);
}



   
}
