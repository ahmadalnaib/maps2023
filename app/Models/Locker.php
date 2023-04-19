<?php

namespace App\Models;

use App\Models\Door;
use App\Models\Place;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Locker extends Model
{
    use HasFactory,HasUuids;
    protected $guarded=[];
    public function place()
{
    return $this->belongsTo(Place::class);
}

public function doors()
{
    return $this->hasMany(Door::class);
}
}
