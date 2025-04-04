<?php

namespace App\Http\Livewire;

use App\Models\Rental;
use App\Models\Rentals;
use Livewire\Component;

class ChartOrders extends Component
{
    public $selectedYear;
    public $thisYearOrders;
     public $lastYearOrders;
     public $rentals;


    public function mount(){
        $this->selectedYear=date('Y');
        $this->updateOrdersCount();
    }

    public function updateOrdersCount(){
        $user = auth()->user(); // get the current authenticated user

        $this->thisYearOrders = Rental::whereHas('system', function ($query) use ($user) {
                                       $query->where('team_id',$user->currentTeam->id);
                                   })
                                   ->getYearOrders($this->selectedYear)
                                   ->groupByMonth();
    
        $this->lastYearOrders = Rental::whereHas('system', function ($query) use ($user) {
                                       $query->where('team_id',$user->currentTeam->id);
                                   })
                                   ->getYearOrders($this->selectedYear - 1)
                                   ->groupByMonth();

        $this->rentals = Rental::whereHas('system', function ($query) use ($user) {
                                    $query->where('team_id',$user->currentTeam->id);
                                 })->get();
    
        $this->emit('updateTheChart');
    }
    public function render()
    {
        $availableYears=[
            date('Y'),date('Y') -1 ,date('Y') -2,date('Y') -3
        ];
        return view('livewire.chart-orders', [
            'availableYears' => $availableYears,
            'rentals' => $this->rentals,
        ]);
    }
}
