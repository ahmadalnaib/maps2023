<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class CreateUser extends Component
{
    public $name;
    public $tenant_id;
    public $role;
    public $email;
    public $password;
    public $isLoading = false;

    protected $rules = [
        'name' => 'required',
        'role' => 'required|in:admin,user',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8',
    ];

    public function render()
    {
        return view('livewire.create-user');
    }

    public function createUser()
    {
        $this->validate();

        $this->isLoading = true;

        $user = new User();
        $user->name = $this->name;
        $user->tenant_id = User::max('tenant_id') + 1;
        $user->role = $this->role;
        $user->email = $this->email;
        $user->password = Hash::make($this->password);
        $user->save();

        Mail::to($user->email)->send(new WelcomeEmail($user->name, $user->email, $this->password));

        session()->flash('message', 'User created successfully.');

        $this->resetForm();
        $this->isLoading = false;
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
