<?php

namespace App\Http\Livewire;
use App\Models\User;
use Livewire\WithPagination;
use Livewire\Component;

class Users extends Component
{
    use WithPagination;

 
    public $search;
    public $sortField;
    public $sortAsc = true;
    protected $queryString = ['search',  'sortAsc', 'sortField'];

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.users',[
            'users' => User::where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%');
            })
            ->where('role', 'basic') // Add this line to filter by role
            ->when($this->sortField, function ($query) {
                $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
            })->paginate(10),
        ]);
    }
}
