<?php

namespace App\Http\Livewire\Stats;

use App\Models\User;
use App\Models\Rental;
use App\Models\Rentals;
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
        $user = auth()->user(); // get the current authenticated user

    $this->rentalsCount = Rental::where('created_at', '>=', now()->subDays($this->selectedDays))
                                  ->whereHas('system', function ($query) use ($user) {
                                      $query->where('tenant_id', $user->id);
                                  })
                                  ->count();
    }
    public function render()
    {
        return view('livewire.stats.rentals-count');
    }
}
