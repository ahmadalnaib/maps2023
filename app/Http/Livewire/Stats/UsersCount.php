<?php

namespace App\Http\Livewire\Stats;

use App\Models\User;
use Livewire\Component;

class UsersCount extends Component
{
    public $usersCount;
    public $selectedDays;

    public function mount()
    {
        $this->selectedDays=30;
        $this->updateStat();
    }

    public function updateStat()
    {
        $user = auth()->user(); // Get the current authenticated user
    
        $this->usersCount = User::whereHas('rentals', function ($query) use ($user) {
            $query->whereHas('door', function ($subQuery) use ($user) {
                $subQuery->where('tenant_id', $user->tenant_id);
            });
        })->count();
    
    }
    public function render()
    {
        return view('livewire.stats.users-count');
    }
}
