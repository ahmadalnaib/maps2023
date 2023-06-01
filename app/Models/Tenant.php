<?php

namespace App\Models;

use App\Models\Door;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tenant extends Model
{
    protected $guarded=[];
    use HasFactory;

    public function doors()
    {
        return $this->hasMany(Door::class);
    }
}
