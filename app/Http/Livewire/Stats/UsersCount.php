<?php

namespace App\Http\Livewire\Stats;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

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
    $user = Auth::user(); // Get the current authenticated user
    
    $this->usersCount = User::whereHas('rentals', function ($query) use ($user) {
        $query->whereHas('box', function ($subQuery) use ($user) {
            $subQuery->where('team_id', $user->currentTeam->id); // Use team_id instead of tenant_id
        });
    })->count();
}
    public function render()
    {
        return view('livewire.stats.users-count');
    }
}
