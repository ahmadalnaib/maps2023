<?php

namespace App\Models;

use App\Scopes\TenantScope;
use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class How extends Model
{
    use HasFactory,BelongsToTenant ;
    protected $guarded=[];
   
}
