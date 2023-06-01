<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class CreateUser extends Component
{
    public $name;
    public $tenant_id;
    public $role;
    public $email;
    public $password;

    public function render()
    {
        return view('livewire.create-user');
    }

    public function createUser()
    {
        // Validation can be added here if needed
        $user = new User();
    $user->name = $this->name;
    $user->tenant_id = User::max('tenant_id') + 1;
    $user->role = $this->role;
    $user->email = $this->email;
    $user->password = Hash::make($this->password);
    $user->save();

    session()->flash('message', 'User created successfully.');

    $this->resetForm();
    }

    private function resetForm()
    {
        $this->name = '';
        $this->tenant_id = '';
        $this->role = '';
        $this->email = '';
        $this->password = '';
    }
}
