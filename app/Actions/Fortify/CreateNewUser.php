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
                
                
            ];
            // if ($tokenValid) {$createArray['current_team_id'] = $tokenValid->current_team_id;}
            // return tap(User::create($createArray), function (User $user) {
            //     $this->createTeam($user);
            // });
            if ($tokenValid) {
                $createArray['current_team_id'] = $tokenValid['team_id'];
                $createArray['tenant_id'] = $tokenValid['tenant_id'];
            }
            return tap(User::create($createArray), function (User $user) {
                $this->createTeam($user);
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
                'tenant_id' => $invitation->tenant_id,
            ];
        }
    }
    return false;
}

    /**
     * Create a personal team for the user.
     */
    protected function createTeam(User $user): void
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));
    }
}
