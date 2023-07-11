<?php

namespace App\Actions\Fortify;

use App\Models\Team;
use App\Models\User;
use App\Models\Tenant;
use Illuminate\Http\Request;
use App\Models\TeamInvitation;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Contracts\AddsTeamMembers;
use Laravel\Jetstream\Http\Controllers\TeamInvitationController;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            'street' => ['required', 'string', 'max:255'],
            'street_number' => ['required'],
            'postcode' => ['required'],
            'city' => ['required', 'string', 'max:255'],
            'country_id' => ['required'],
            'phone_number' => ['required', 'string', 'max:255'],
        ])->validate();

        $tenant=Tenant::create([
        'name'=>$input['name'],
        ]);
   $token = request()->query()['token']  ?? '';
  
   $tokenValid = $this->checkTokenAgainstTeams($token);
//   $tokenValid = true;
        return DB::transaction(function () use ($input,$tenant, $tokenValid) {
            $createArray = [
                'name' => $input['name'],
                'email' => $input['email'],
                'tenant_id'=>$tenant->id,
                'role'=> $tokenValid ? 'admin': 'basic',
                'password' => Hash::make($input['password']),
                'street' => $input['street'],
                'street_number' => $input['street_number'],
                'postcode' => $input['postcode'],
                'city' => $input['city'],
                'country_id'=>$input['country_id'],
                'phone_number' => $input['phone_number'],
                
                
            ];
            // if ($tokenValid) {$createArray['current_team_id'] = $tokenValid->current_team_id;}
            // return tap(User::create($createArray), function (User $user) {
            //     $this->createTeam($user);
            // });
            if ($tokenValid) {
                $createArray['current_team_id'] = $tokenValid['team_id'];
               
            }
            return tap(User::create($createArray), function (User $user) use ($tokenValid, $createArray){
                $role = $createArray['role'];
                $this->createTeam($user, $tokenValid, $role);
        });
    });
    }


    // protected function checkTokenAgainstTeams(string $token){
    //     $invitations = TeamInvitation::all();
    //     foreach ($invitations as $invitation){
    //         var_dump($invitation->email);
    //         var_dump($token);
    //         if ( \Hash::make($invitation->email) === $token ){
    //             return $invitation;
    //         }
    //     }
    //     return false;
    // }
    protected function checkTokenAgainstTeams(string $token)
{
    $invitations = TeamInvitation::all();
    foreach ($invitations as $invitation) {
        if (Hash::check($invitation->email, $token)) {
            return [
                'team_id' => $invitation->team_id,
                'id' => $invitation->id
                
            ];
        }
    }
    return false;
}

    /**
     * Create a personal team for the user.
     */
    protected function createTeam(User $user, $tokenValid, string $role): bool
    {
        if ($role === 'basic'){
            return false;
        }
        if ($tokenValid){
            $invitation = TeamInvitation::where('id',$tokenValid['id'] )->firstOrFail();
            // $model = Jetstream::teamInvitationModel();

            // $invitation = $model::whereKey($invitationId->id, )->firstOrFail();
    
            app(AddsTeamMembers::class)->add(
                $invitation->team->owner,
                $invitation->team,
                $invitation->email,
                $invitation->role
                
            );
    
            $invitation->delete();
            return false;
        }
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));
        return true;
    }
}
