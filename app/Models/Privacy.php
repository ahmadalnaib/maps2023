<?php

namespace App\Models;

use App\Scopes\TenantScope;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Privacy extends Model
{

    use HasFactory,HasTranslations ;
    protected $guarded=[];
    public $translatable = ['content'];
   
}
