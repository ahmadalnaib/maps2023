<?php

namespace App\Models;

use App\Models\Door;
use App\Models\User;
use App\Models\Locker;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rentals extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function user()
{
    return $this->belongsTo(User::class);
}

public function locker()
{
    return $this->belongsTo(Locker::class);
}

public function door()
{
    return $this->belongsTo(Door::class);
}

}
