<?php

namespace App\Http\Livewire\Stats;

use App\Models\Rentals;
use App\Models\User;
use Livewire\Component;

class RentalsCount extends Component
{
    public $rentalsCount;
    public $selectedDays;

    public function mount()
    {
        $this->selectedDays=30;
        $this->updateStat();
    }

    public function updateStat()
    {
        $this->rentalsCount=Rentals::where('created_at','>=',now()->subDays($this->selectedDays))->count();
    }
    public function render()
    {
        return view('livewire.stats.rentals-count');
    }
}
