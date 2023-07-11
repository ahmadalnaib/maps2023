<?php

namespace App\Http\Livewire;

use App\Models\Team;
use App\Models\User;
use App\Models\Tenant;
use App\Models\Country;
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
    public $street;
    public $street_number;
    public $postcode;
    public $city;
    public $phone_number;
    public $country_id;
    public $isLoading = false;

    protected $rules = [
        'name' => 'required',
        'role' => 'required|in:admin,user',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8',
        'street' => 'required',
        'street_number' =>'required',
        'postcode' => 'required',
        'city' => 'required',
        'country_id' => 'required',
        'phone_number' => 'required',
    ];

    public function render()
    {
        $countries = Country::all();
        return view('livewire.create-user',compact('countries'));
    }

    protected function createTeam(User $user): void
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));
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
        $user->tenant_id = $tenant->id; 
        $user->role = $this->role;
        $user->email = $this->email;
        $user->street = $this->street;
        $user->street_number = $this->street_number;
        $user->postcode = $this->postcode;
        $user->city = $this->city;
        $user->country_id = $this->country_id;
        $user->phone_number = $this->phone_number;
        $user->password = Hash::make($this->password);
        $user->save();

        $this->createTeam($user);

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
        $this->street = '';
        $this->street_number = '';
        $this->postcode = '';
        $this->city = '';
        $this->country_id = '';
        $this->phone_number = '';
        $this->password = '';
    }
    
}
