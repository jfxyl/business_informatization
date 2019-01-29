<?php

namespace App\Providers;

use App\Models\ChannelRecord;
use App\Policies\ChannelRecordPolicy;
use App\Models\EnterDepot;
use App\Policies\EnterDepotPolicy;
use App\Models\WinBid;
use App\Policies\WinBidPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        ChannelRecord::class => ChannelRecordPolicy::class,
        EnterDepot::class => EnterDepotPolicy::class,
        WinBid::class => WinBidPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
