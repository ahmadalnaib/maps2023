<?php

namespace App\Models;

use App\Helpers\Slug;
use App\Models\Locker;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Place extends Model
{
    use HasFactory;
   protected $guarded=['id','view_count'];

   
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function bookmarks()
    {
        return $this->belongsToMany('App\Models\Bookmark', 'bookmarks');
    }

    public function lockers()
{
    return $this->hasMany(Locker::class);
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
