<?php

namespace App\Http\Livewire\Stats;

use App\Models\Rental;
use App\Models\Payment;
use Livewire\Component;

class RevenueCount extends Component
{
    public $revenueCount;
    public $selectedDays;

    public function mount()
    {
        $this->selectedDays=30;
        $this->updateStat();
    }

    public function updateStat()
    {
        
        $user = auth()->user(); // Get the current authenticated user
        $this->revenueCount = Rental::where('created_at', '>=', now()->subDays($this->selectedDays))
        ->where(function ($query) use ($user) {
            $query->whereHas('system', function ($subQuery) use ($user) {
                $subQuery->where('tenant_id', $user->id);
            })->orWhereHas('box', function ($subQuery) use ($user) {
                $subQuery->where('user_id', $user->id);
            });
        })
        ->sum('price');
}

    
    public function render()
    {
        return view('livewire.stats.revenue-count');
    }
}
