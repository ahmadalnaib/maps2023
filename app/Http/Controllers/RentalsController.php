<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Door;
use App\Models\Locker;
use App\Models\Rentals;
use Illuminate\Http\Request;


class RentalsController extends Controller
{
    public function rent(Request $request)
{
    $request->validate([
        'locker_id' => 'required|exists:lockers,id',
        'door_id' => 'required|exists:doors,id',
        'rental_period' => 'required|integer',
    ]);

    $door = Door::find($request->door_id);
    $locker = Locker::find($request->locker_id);
    $rental_period = $request->rental_period;
    $start_time = Carbon::now();

    if ($rental_period >= 7 && $rental_period < 30) {
        $duration = '1 week';
        $end_time = $start_time->copy()->addWeeks(1)->subDay();
    } elseif ($rental_period >= 30 && $rental_period < 365) {
        $duration = '1 month';
        $end_time = $start_time->copy()->addMonths(1)->subDay();
    } elseif ($rental_period >= 365) {
        $duration = '1 year';
        $end_time = $start_time->copy()->addYears(1)->subDay();
    } else {
        $duration = '1 day';
        $end_time = $start_time->copy()->addDay()->subSecond();
    }


    $price_per_day = 1;
    $price_per_week = 5;
    $price_per_month = 15;
    $price_per_year = 90;

   $duration = '1 day'; // default duration value
        if ($rental_period >= 7 && $rental_period < 30) {
            $duration = '1 week';
            $price_per_day = $price_per_week / 7;
        } elseif ($rental_period >= 30 && $rental_period < 365) {
            $duration = '1 month';
            $price_per_day = $price_per_month / 30;
        } elseif ($rental_period >= 365) {
            $duration = '1 year';
            $price_per_day = $price_per_year / 365;
        }
    $price = $rental_period * $price_per_day;
    $rental = new Rentals([
        "locker_id"=>$locker->id,
        "user_id"=>auth()->id(),
        'door_id' => $door->id,
        'start_time' => $start_time,
        'end_time' => $end_time,
        'duration' => $duration,
        'price' => $price,
    ]);




    $locker = Locker::find($request->locker_id);

    $lockers = Locker::with('doors.rentals')->get();

    return view('rentals', [
        'lockers' => $lockers,
        'rental' => $rental,
        'locker' => $locker,
        'door' => $door,
        'start_time' => $start_time,
        'end_time' => $end_time,
    ]);

    
}


}
