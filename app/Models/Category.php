<?php

namespace App\Models;

use App\Helpers\Slug;
use App\Scopes\TenantScope;
use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory,  BelongsToTenant;
    protected $guarded=[];
    public function places()
    {
        return $this->hasMany('App\Models\Place');
    }


    public function getImageAttribute($image){
        return asset('storage/'.$image);
    }
    
    public function setNameAttribute($value)
    {
        $this->attributes['title']=$value;
        $this->attributes['slug']=Slug::uniqueSlug($value,'categories');
    }

   
    
}
