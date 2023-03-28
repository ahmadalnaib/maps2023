<?php

namespace App\Models;

use App\Models\Locker;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Door extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function locker()
{
    return $this->belongsTo(Locker::class);
}

public function rentals()
    {
        return $this->hasMany(Rentals::class);
    }

    public function isAvailable()
    {
        return $this->rental_status === 'available';
    }
}
