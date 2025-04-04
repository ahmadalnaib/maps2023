<?php

namespace App\Models;

use App\Models\Box;
use App\Models\Door;
use App\Models\Plan;
use App\Models\User;
use Ramsey\Uuid\Uuid;
use App\Models\Locker;
use App\Models\System;
use App\Models\Duration;
use App\Traits\BelongsToTenant;
use App\Models\AdditionalRental;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rental extends Model
{
    use HasFactory,BelongsToTenant ;
    protected $guarded=[];

    // protected $casts = [
    //     'system_id' => 'integer',
    //     'box_id' => 'integer',
    // ];


    protected $casts = [ 'end_time'=>'datetime'];



    public function user()
{
    return $this->belongsTo(User::class);
}

public function system()
{
    return $this->belongsTo(System::class);
}

public function box()
{
    return $this->belongsTo(Box::class);
}

public function plan()
{
    return $this->belongsTo(Plan::class);
}


public function scopeGroupByMonth(Builder $query)
{
    $months = [
        1 => 'January',
        2 => 'February',
        3 => 'March',
        4 => 'April',
        5 => 'May',
        6 => 'June',
        7 => 'July',
        8 => 'August',
        9 => 'September',
        10 => 'October',
        11 => 'November',
        12 => 'December',
    ];
    
    
    $counts = array_fill_keys(array_values($months), 0);

    $results = $query->selectRaw('monthname(created_at) as month')
        ->selectRaw('count(*) as count')
        ->groupBy('month')
        ->orderByRaw('month(created_at)')
        ->get();

    foreach ($results as $result) {
        $counts[$result->month] = $result->count;
    }

    return $counts;

    
}

public function scopeGetYearOrders(Builder $query,$year)
{
    return $query->whereYear('created_at',$year);
}


public static function search($query)
{
    return empty($query) ? static::query()
        : static::where('system_id', 'like', '%'.$query.'%')
           ;
}

public function additionalRentals()
{
    return $this->hasMany(AdditionalRental::class, 'rental_uuid', 'uuid');
}


}
