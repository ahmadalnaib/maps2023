<?php

namespace App\Models;

use App\Scopes\TenantScope;
use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class How extends Model
{
    use HasFactory,BelongsToTenant,HasTranslations ;
    protected $guarded=[];

    public $translatable = ['main_title','main_subtitle','title_one','subtitle_one','title_two','subtitle_two','title_three','subtitle_three','title_four','subtitle_four'];
   
}
