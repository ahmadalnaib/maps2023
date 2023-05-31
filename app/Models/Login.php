<?php

namespace App\Models;

use App\Models\User;
use App\Scopes\TenantScope;
use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Login extends Model
{
    use HasFactory,BelongsToTenant ;
    protected $guarded = [];

 


   
}
