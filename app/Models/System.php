<?php

namespace App\Models;

use App\Models\Box;
use App\Scopes\TenantScope;
use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class System extends Model
{
    use HasFactory,BelongsToTenant ;

    public function boxes()
    {
        return $this->hasMany(Box::class);
    }
   
}
