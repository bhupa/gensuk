<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(
        [
            'frontend.home','frontend.app','frontend.about'
          ,
        ],
        'App\Http\Composer\Frontend\HomeComposer'
    ); //
        view()->composer(
            [
                'frontend.event.list','frontend.blog.list'
                ,
            ],
            'App\Http\Composer\Frontend\EventComposer'
        ); //
    }
}
