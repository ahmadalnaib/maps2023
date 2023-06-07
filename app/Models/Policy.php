<?php

namespace App\Models;

use App\Models\Plan;
use App\Scopes\TenantScope;
use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Policy extends Model
{
    use HasFactory,BelongsToTenant ;
    protected $guarded=[];


    public function plans()
    {
        return $this->hasMany(Plan::class);
    }
   
}
