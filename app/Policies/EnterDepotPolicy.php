<?php

namespace App\Policies;

use App\Models\User;
use App\Models\EnterDepot;
use Illuminate\Auth\Access\HandlesAuthorization;

class EnterDepotPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function own(User $user,EnterDepot $enterDepot)
    {
        return $user->id === $enterDepot->user_id;
    }
}
