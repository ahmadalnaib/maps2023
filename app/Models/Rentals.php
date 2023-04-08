<?php

namespace App\Models;

use App\Models\Door;
use App\Models\User;
use App\Models\Locker;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rentals extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function user()
{
    return $this->belongsTo(User::class);
}

public function locker()
{
    return $this->belongsTo(Locker::class);
}

public function door()
{
    return $this->belongsTo(Door::class);
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


}
