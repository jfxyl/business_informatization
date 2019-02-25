<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ChannelRecord;
use Illuminate\Auth\Access\HandlesAuthorization;

class ChannelRecordPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function own(User $user,ChannelRecord $channelRecord)
    {
        return $user->id === $channelRecord->user_id;
    }
}
