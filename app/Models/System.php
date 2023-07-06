<?php

namespace App\Models;
use App\Models\Box;
use App\Models\Team;
use App\Models\User;
use App\Models\Place;
use App\Models\Rental;
use App\Scopes\TenantScope;

use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class System extends Model
{
    use HasFactory,BelongsToTenant, HasUuids ;
    protected $guarded=[];
    


        public function boxes()
        {
            return $this->hasMany(Box::class);
        }

            public function rentals()
        {
            return $this->hasMany(Rental::class);
        }

        public function place()
        {
            return $this->belongsTo(Place::class);
        }

        public function team()
        {
            return $this->belongsTo(Team::class);
        }



        public static function search($query)
        {
            return empty($query) ? static::query()
                : static::where('system_name', 'like', '%'.$query.'%')
                   ;
        }
    
   
}
