<?php

namespace App\Models;

use App\Scopes\TenantScope;
use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faq extends Model
{
    use HasFactory,HasTranslations ;
    protected $guarded=[];

    public $translatable = ['question_one','answer_one','question_two','answer_two','question_three','answer_three','question_four','answer_four','question_five','answer_five','question_six','answer_six','question_seven','answer_seven','question_eight','answer_eight',];
   
}
