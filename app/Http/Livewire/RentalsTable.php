<?php

namespace App\Http\Livewire;

use App\Models\Rental;
use Livewire\Component;
use Livewire\WithPagination;
use App\Exports\RentalsExport;
use App\Models\AdditionalRental;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class RentalsTable extends Component
{
    use WithPagination;

    public $search = '';

    public function exportToExcel()
    {
        $user = Auth::user();
        $rentals = Rental::where(function ($query) use ($user) {
            $query->whereHas('system', function ($query) use ($user) {
                $query->where('team_id', $user->currentTeam->id);
            })
            ->orWhereHas('box', function ($query) use ($user) {
                $query->where('team_id', $user->currentTeam->id);
            });
        })
            ->orderBy('created_at', 'desc')
            ->get();

        return Excel::download(new RentalsExport($rentals), 'rentals.xlsx');
    }

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

            $additionalRentals = AdditionalRental::whereIn('rental_uuid', $rentals->pluck('uuid')->toArray())->get();
    
        return view('livewire.rentals-table', [
            'rentals' => $rentals,
            'additionalRentals' => $additionalRentals,
        ]);
    }
    
}
