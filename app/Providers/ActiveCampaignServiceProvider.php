<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ActiveCampaignService;

class ActiveCampaignServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(ActiveCampaignService::class, function ($app) {
            return new ActiveCampaignService();
        });
    }

    public function boot()
    {
        //
    }
}
