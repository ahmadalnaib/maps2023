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


    public function mount(){
        $this->selectedYear=date('Y');
        $this->updateOrdersCount();
    }

    public function updateOrdersCount(){
        $user = auth()->user(); // get the current authenticated user

        $this->thisYearOrders = Rental::whereHas('locker', function ($query) use ($user) {
                                       $query->where('tenant_id', $user->id);
                                   })
                                   ->getYearOrders($this->selectedYear)
                                   ->groupByMonth();
    
        $this->lastYearOrders = Rental::whereHas('locker', function ($query) use ($user) {
                                       $query->where('tenant_id', $user->id);
                                   })
                                   ->getYearOrders($this->selectedYear - 1)
                                   ->groupByMonth();
    
        $this->emit('updateTheChart');
    }
    public function render()
    {
        $availableYears=[
            date('Y'),date('Y') -1 ,date('Y') -2,date('Y') -3
        ];
        return view('livewire.chart-orders',compact('availableYears'));
    }
}
