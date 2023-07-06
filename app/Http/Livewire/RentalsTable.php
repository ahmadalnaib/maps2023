<?php

namespace App\Http\Livewire;

use App\Models\Rental;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class RentalsTable extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        $user = Auth::user(); // Get the current authenticated user
    
        $rentals = Rental::where(function ($query) use ($user) {
                $query->whereHas('system', function ($query) use ($user) {
                    $query->where('team_id', $user->currentTeam->id);
                })
                ->orWhereHas('box', function ($query) use ($user) {
                    $query->where('team_id', $user->currentTeam->id);
                });
            })
            ->when($this->search, function ($query, $search) {
                $query->where(function ($query) use ($search) {
                    $query->whereHas('user', function ($query) use ($search) {
                        $query->where('name', 'like', '%' . $search . '%')
                            ->orWhere('email', 'like', '%' . $search . '%');
                    });
                });
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    
        return view('livewire.rentals-table', [
            'rentals' => $rentals,
        ]);
    }
    
}
