<?php

namespace App\Models;

use App\Scopes\TenantScope;
use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Duration extends Model
{
    use HasFactory,BelongsToTenant ;
    protected $guarded=[];
    public function doors()
{
    return $this->belongsToMany(Door::class);
}

   
}
