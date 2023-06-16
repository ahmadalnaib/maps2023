<?php

namespace App\Models;

use App\Scopes\TenantScope;
use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Price extends Model
{
    use HasFactory,HasTranslations;

    public $translatable = ['main_title','main_subtitle','title_one','subtitle_one','price_one','tag_one_one','tag_one_two','tag_one_three','tag_one_four','tag_one_five','tag_one_six','title_two','subtitle_two','price_two','tag_two_one','tag_two_two','tag_two_three','tag_two_four','tag_two_five','tag_two_six','title_three','subtitle_three','price_three','tag_three_one','tag_three_two','tag_three_three','tag_three_four','tag_three_five','tag_three_six','title_four','subtitle_four','price_four','tag_four_one','tag_four_two','tag_four_three','tag_four_four','tag_four_five','tag_four_five','tag_four_six'];
    
    protected $guarded=[];
   
}
