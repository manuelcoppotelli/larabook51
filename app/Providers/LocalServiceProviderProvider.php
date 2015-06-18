<?php

namespace Larabook\Providers;

use Illuminate\Support\ServiceProvider;


class LocalServiceProviderProvider extends ServiceProvider
{

    /**
     * The Service Providers to register only for the specific environment.
     *
     * @var array
     */
    protected $providers = [

    ];

    /**
     * The environment you want to register the services for.
     *
     * @var string
     */
    protected $env = 'local';

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment($this->env) && ! empty($this->providers)) {
            $this->bindLocalProviders();
        }
    }

    /**
     * Loop through the stored providers and register each of them with the IoC container.
     *
     * @return void
     */
    private function bindLocalProviders()
    {
        foreach ($this->providers as $provider) {
            $this->app->register($provider);
        }
    }
}
