<?php

namespace App\Policies;

use App\Models\Box;
use App\Models\User;

class BoxPolicy
{
 

    public function delete(User $user, Box $box)
    {
        return $user->id === $box->user_id;

    }
  
}
