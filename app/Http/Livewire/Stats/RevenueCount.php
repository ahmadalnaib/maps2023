<?php

namespace App\Http\Livewire\Stats;

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
        
        $this->revenueCount=Payment::where('created_at','>=',now()->subDays($this->selectedDays))->sum('amount');
    }
    public function render()
    {
        return view('livewire.stats.revenue-count');
    }
}
