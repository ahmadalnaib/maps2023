<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Tenant;
use Livewire\Component;
use App\Mail\WelcomeEmail;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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

        // Create a new tenant
    $tenant = new Tenant();
    $tenant->name = $this->name;
    $tenant->save();

        $user = new User();
        $user->name = $this->name;
        // $user->tenant_id = User::max('tenant_id') + 1;
        $user->tenant_id = $tenant->id; 
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
