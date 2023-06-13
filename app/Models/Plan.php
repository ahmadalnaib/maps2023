<?php

namespace App\Models;

use App\Models\Box;
use App\Models\Policy;
use App\Models\Rental;
use App\Models\BoxType;
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

    public function policy()
    {
        return $this->belongsTo(Policy::class);
    }
  
    public function boxType()
    {
        return $this->belongsTo(BoxType::class);
    }

    public function boxes()
    {
        return $this->belongsToMany(Box::class);
    }

 
   
}
