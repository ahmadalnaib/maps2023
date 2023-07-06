<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Rental;
use App\Models\System;
use Livewire\Component;
use Livewire\WithPagination;

class SuperRental extends Component
{

    use WithPagination;
    public $perPage = 10;
    public $sortField = 'system_id';
    public $sortAsc = true;
    public $search = '';
    public $super;
    public $users;
    public $selectedTenant;

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = ! $this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function mount()
    {
        if(session()->has('tenant_id')) {
            $this->super = false;
        } else {
            $this->super = true;
            $this->systems = System::all()->pluck('system_name', 'id')->toArray();
        }
    }
    public function render()
    {
        $query = Rental::search($this->search)
        ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
    if($this->super && $this->selectedTenant) {
        $query->where('system_id', $this->selectedTenant);
    }
        return view('livewire.super-rental',[
            'rentals' => $query->paginate($this->perPage),
        ]);
    }
}
