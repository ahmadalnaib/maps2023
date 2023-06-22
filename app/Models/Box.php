<?php

namespace App\Models;

use App\Models\Plan;
use App\Models\Rental;
use App\Models\System;
use App\Models\BoxType;
use App\Scopes\TenantScope;
use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Box extends Model
{
    use HasFactory,BelongsToTenant,HasUuids ;
    protected $guarded=[];



    public function boxType()
    {
        return $this->belongsTo(BoxType::class);
    }
    public function system()
    {
        return $this->belongsTo(System::class);
    }

    public function plans()
    {
        return $this->belongsToMany(Plan::class);
    }
    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }
   
}
