<?php

namespace App\Models;

use App\Models\User;
use App\Scopes\TenantScope;
use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model
{
    use HasFactory,HasTranslations ;

    
    public $translatable = ['name',];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
   
}
