<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Door;
use App\Models\Locker;
use App\Models\Rental;
use App\Models\Rentals;
use App\Models\Duration;
use Illuminate\Http\Request;


class RentalsController extends Controller
{
    public function rent(Request $request)
{
    $validatedData = $request->validate([
        'locker_id' => 'required|exists:lockers,id',
        'door_id' => 'required|exists:doors,id',
        'rental_period' => 'required|exists:durations,id',
    ]);

    // $door = Door::find($request->door_id);
    // $locker = Locker::find($request->locker_id);
    // $rental_period = $request->rental_period;
    // $start_time = Carbon::now();

    // if ($rental_period >= 7 && $rental_period < 30) {
    //     $duration = '1 week';
    //     $end_time = $start_time->copy()->addWeeks(1)->subDay();
    // } elseif ($rental_period >= 30 && $rental_period < 365) {
    //     $duration = '1 month';
    //     $end_time = $start_time->copy()->addMonths(1)->subDay();
    // } elseif ($rental_period >= 365) {
    //     $duration = '1 year';
    //     $end_time = $start_time->copy()->addYears(1)->subDay();
    // } else {
    //     $duration = '1 day';
    //     $end_time = $start_time->copy()->addDay()->subSecond();
    // }


//     $price_per_day = 1;
//     $price_per_week = 5;
//     $price_per_month = 15;
//     $price_per_year = 90;

//     if ($door->is_big) {
//         // Double the prices if the door is big
//         $price_per_day *= 2;
//         $price_per_week *= 2;
//         $price_per_month *= 2;
//         $price_per_year *= 2;
//     }

//    $duration = '1 day'; // default duration value
//         if ($rental_period >= 7 && $rental_period < 30) {
//             $duration = '1 week';
//             $price_per_day = $price_per_week / 7;
//         } elseif ($rental_period >= 30 && $rental_period < 365) {
//             $duration = '1 month';
//             $price_per_day = $price_per_month / 30;
//         } elseif ($rental_period >= 365) {
//             $duration = '1 year';
//             $price_per_day = $price_per_year / 365;
//         }
//     $price = $rental_period * $price_per_day;

$locker = Locker::findOrFail($validatedData['locker_id']);
$door = Door::findOrFail($validatedData['door_id']);
$duration = Duration::findOrFail($validatedData['rental_period']);

$durationId = $duration->id;
$duration = Duration::where('name', $durationName)->first();

$start_time = Carbon::now();
$start_time = Carbon::now();

if ($duration) {
    switch ($duration->name) {
        case 'week':
            $durationString = '1 week';
            $end_time = $start_time->copy()->addWeeks(1)->subDay();
            break;
        case 'month':
            $durationString = '1 month';
            $end_time = $start_time->copy()->addMonths(1)->subDay();
            break;
        case 'year':
            $durationString = '1 year';
            $end_time = $start_time->copy()->addYears(1)->subDay();
            break;
        default:
            $durationString = '1 day';
            $end_time = $start_time->copy()->addDay()->subSecond();
            break;
    }
} else {
    // Handle the case when the duration is not found in the database
    // You can set default values or display an error message
    $durationString = 'Unknown';
    $end_time = $start_time;
}

return view('rentals', [
    'door' => $door,
    'locker' => $locker,
    'duration' => (object)['name' => $durationString, 'price' => $duration->price], // Convert the duration to an object
    'startTime' => $start_time,
    'endTime' => $end_time,
]);
}




    // $rental = new Rental([
    //     "locker_id"=>$locker->id,
    //     "user_id"=>auth()->id(),
    //     'door_id' => $door->id,
    //     'start_time' => $start_time,
    //     'end_time' => $end_time,
    //     'duration' => $duration,
    //     'price' => $price,
    //     'created_at' => Carbon::now(),
    // ]);




    // $locker = Locker::find($request->locker_id);

    // $lockers = Locker::with('doors.rentals')->get();

    // return view('rentals', [
    //     'lockers' => $lockers,
    //     'rental' => $rental,
    //     'locker' => $locker,
    //     'door' => $door,
    //     'start_time' => $start_time,
    //     'end_time' => $end_time,
    // ]);

    
}



