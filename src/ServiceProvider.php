<?php
namespace LeroyMerlin\Socialite;

use Laravel\Socialite\SocialiteManager;
use Laravel\Socialite\SocialiteServiceProvider;

class ServiceProvider extends SocialiteServiceProvider
{
    public function register()
    {
        $this->app->singleton('Laravel\Socialite\Contracts\Factory', function ($app) {
            $socialiteManager = new SocialiteManager($app);

            $socialiteManager->extend('leroy-merlin', function() use ($socialiteManager) {
                $config = $this->app['config']['services.leroy-merlin'];

                return $socialiteManager->buildProvider(
                    Provider::class,
                    $config
                );
            });

            return $socialiteManager;
        });
    }
}