<?php

namespace App\Http\Livewire;

use App\Models\Box;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class SuperBox extends Component
{

    use WithPagination;
    public $perPage = 10;
    public $sortField = 'number';
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
        $query = Box::search($this->search)
        ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
    if($this->super && $this->selectedTenant) {
        $query->where('tenant_id', $this->selectedTenant);
    }
        return view('livewire.super-box',[
            'boxes' => $query->paginate($this->perPage),
        ]);
    }
  
}
