<?php

namespace App\Http\Livewire;

use App\Models\Rental;
use Livewire\Component;
use Livewire\WithPagination;

class RentalsTable extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        // $rentals = Rental::whereHas('user', function ($query) {
        //         $query->where('name', 'like', '%' . $this->search . '%')
        //               ->orWhere('email', 'like', '%' . $this->search . '%');
        //     })
        //     ->orWhereHas('locker', function ($query) {
        //         $query->where('locker_name', 'like', '%' . $this->search . '%');
        //     })
        //     ->orderBy('created_at', 'desc') // Order by 'created_at' column in descending order
        //     ->paginate(10); // Set the number of items per page

        

        $user = auth()->user(); // Get the current authenticated user

        $rentals = Rental::whereHas('system', function ($query) use ($user) {
                $query->where('tenant_id', $user->id);
            })
            ->orWhereHas('box', function ($query) use ($user) {
                $query->where('tenant_id', $user->id);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        
        
        return view('livewire.rentals-table', [
            'rentals' => $rentals,
        ]);
    }
}
