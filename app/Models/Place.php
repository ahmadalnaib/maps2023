<?php

namespace App\Models;

use App\Helpers\Slug;
use Ramsey\Uuid\Uuid;
use App\Models\Locker;
use App\Models\Rental;
use App\Models\System;
use App\Models\Category;
use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Model;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Place extends Model
{
    use HasFactory,BelongsToTenant,HasTranslations ;
   protected $guarded=[];

   public $translatable = ['overview'];


   protected static function booted()
   {
       static::creating(function ($rental) {
           $rental->uuid = Uuid::uuid4()->toString();
       });
   }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }



    public function systems()
{
    return $this->hasMany(System::class);
}

    public function getImageAttribute($image){
        return asset('storage/images/'.$image);
    }


    public function scopeSearch($query,$request)
    {

        if($request->category){
            $query->whereCategory_id($request->category);
        }

        if($request->address){
            $query->where('address','LIKE','%' .$request->address. '%');
        }

        return $query;

    }

    public function setNameAttribute($value)
    {
        $this->attributes['name']=$value;
        $this->attributes['slug']=Slug::uniqueSlug($value,'places');
    }
}
