<?php

namespace App\Models;

use App\Scopes\TenantScope;
use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdditionalRental extends Model
{
    protected $guarded=[];
    
    use HasFactory,BelongsToTenant ;
   
}
