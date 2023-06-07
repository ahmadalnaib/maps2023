<?php

namespace App\Models;

use App\Models\Box;
use App\Models\Plan;
use App\Scopes\TenantScope;
use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BoxType extends Model
{
    use HasFactory,BelongsToTenant ;

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function boxes()
    {
        return $this->hasMany(Box::class);
    }
   
}
