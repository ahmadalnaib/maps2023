<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Door;
use App\Models\Locker;
use App\Models\Rental;
use App\Models\Plan;
use Illuminate\Http\Request;

class RentalsController extends Controller
{
    public function rent(Request $request)
    {
        $validatedData = $request->validate([
            'locker_id' => 'required|exists:lockers,id',
            'door_id' => 'required|exists:doors,id',
            'rental_period' => 'required|exists:plans,id',
        ]);

        $locker = Locker::findOrFail($validatedData['locker_id']);
        $door = Door::findOrFail($validatedData['door_id']);
        $plan = Plan::findOrFail($validatedData['rental_period']);

        $start_time = Carbon::now();

        // Calculate end time based on plan's number of days
        $end_time = $start_time->copy()->addDays($plan->number_of_days)->subSecond();

        // Calculate price based on plan's price
        $price = $plan->price;

        // if ($door->size==="big") {
        //     $price *= 2;
        // }

        // Create the rental record
        $rental = new Rental([
            "locker_id" => $locker->id,
            "user_id" => auth()->id(),
            'door_id' => $door->id,
            'start_time' => $start_time,
            'end_time' => $end_time,
            'plan_id' => $plan->id,
            'price' => $price,
            'created_at' => Carbon::now(),
        ]);

        // Save the rental record
        // $rental->save();

        return view('rentals', [
            'rental' => $rental,
            'locker' => $locker,
            'door' => $door,
            'start_time' => $start_time,
            'end_time' => $end_time,
            'plan'=>$plan,
        ]);
    }
}
