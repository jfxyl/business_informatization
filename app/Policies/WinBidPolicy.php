<?php

namespace App\Policies;

use App\Models\User;
use App\Models\WinBid;
use Illuminate\Auth\Access\HandlesAuthorization;

class WinBidPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function own(User $user,WinBid $winBid){
        return $user->id === $winBid->user_id;
    }
}
