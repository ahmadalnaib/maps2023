<?php

namespace App\Http\Livewire;

use App\Models\Login;
use Livewire\Component;
use Livewire\WithPagination;

class LoginUser extends Component
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
        return view('livewire.login-user',[
            'loginUsers' => Login::where(function ($query) {
                $query->where('user_id', 'like', '%' . $this->search . '%')
                    ->orWhere('created_at', 'like', '%' . $this->search . '%');
            })
             
            ->when($this->sortField, function ($query) {
                $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
            })->paginate(10),

        ]);
    }
}
