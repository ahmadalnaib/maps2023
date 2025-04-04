<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Country;
use Livewire\Component;
use Livewire\WithPagination;

class Tenant extends Component
{
    use WithPagination;
    public $search;
    public $sortField;
    public $sortAsc = true;
    public $editUserId;
    public $user = [
        'name' => '',
        'email' => '',
        'role' => '',
        'password' => '',
        'street' => '',
        'street_number'=>'',
        'postcode'=>'',
        'city'=>'',
        'country_id'=>'',
        'phone_number' => '',
    ];
    protected $queryString = ['search',  'sortAsc', 'sortField'];

    protected $rules = [
        'user.name' => 'required|string|max:255',
        'user.email' => 'required|email',
        'user.role' => 'required|in:admin,user',
        'user.password' => 'required|string|min:8',
        'user.street'=>'required',
        'user.street_number'=>'required',
        'user.postcode'=>'required',
        'user.city'=>'required',
         'user.country_id'=>'required',
        'user.phone_number'=>'required'
    ];


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

    public function editUser($userId)
    {
        $this->editUserId = $userId;
        $user = User::findOrFail($userId);
        $this->user = [
            'name' => $user->name,
            'email' => $user->email,
            'role' => $user->role,
            'password' => $user->password,
            'street'=>$user->street,
            'street_number'=>$user->street_number,
            'postcode'=>$user->postcode,
            'city'=>$user->city,
            'country_id'=>$user->country_id,
            'phone_number'=>$user->phone_number
        ];
        $this->resetValidation();
    }

    public function cancelEdit()
    {
        $this->editUserId = null;
    }
    
    public function updateUser()
    {
        $this->validate();

        $user = User::findOrFail($this->editUserId);
        $user->name = $this->user['name'];
        $user->email = $this->user['email'];
        $user->role = $this->user['role'];
        $user->password = $this->user['password'];
        $user->street = $this->user['street'];
        $user->street_number = $this->user['street_number'];
        $user->postcode = $this->user['postcode'];
        $user->city = $this->user['city'];
        $user->country_id = $this->user['country_id'];
        $user->phone_number = $this->user['phone_number'];
        $user->save();

        $this->editUserId = null;
        $this->user = [
            'name' => '',
            'email' => '',
            'role' => '',
            'password' => '',
            'street' => '',
            'street_number' => '',
            'postcode' => '',
            'city' => '',
            'country_id' => '',
           
            'phone_number' => '',
        ];
    }
    public function deleteUser($userId)
    {
        User::find($userId)->delete();
    
        session()->flash('message', 'User deleted successfully.');
    
        $this->resetPage();
    }

    public function render()
    {
        

        if ($this->editUserId) {
            $user = User::findOrFail($this->editUserId);
            return view('livewire.edit-user', compact('user'));
        }
        return view('livewire.tenant',[
            'users' => User::where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%');
            })
            ->where('role', 'admin') // Add this line to filter by role
            ->when($this->sortField, function ($query) {
                $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
            })->paginate(10),

        ]);
    }
}
