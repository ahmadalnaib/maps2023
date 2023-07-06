<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\System;
use App\Models\Tenant;
use Livewire\Component;
use Livewire\WithPagination;

class SuperSystem extends Component
{

    use WithPagination;
    public $perPage = 10;
    public $sortField = 'system_name';
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
            $this->users = User::where('role','admin')->pluck('name', 'id','current_team_id')->toArray();
        }
    }

    public function render()
    {
        $query = System::search($this->search)
        ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
    if($this->super && $this->selectedTenant) {
        $query->where('tenant_id', $this->selectedTenant);
    }
        return view('livewire.super-system',[
            'systems' => $query->paginate($this->perPage),
        ]);
    }
  
}
