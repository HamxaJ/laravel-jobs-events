<?php

namespace App\Providers;

use App\Events\OrderShiped;
use App\Listeners\SendEmailNotificationToUser;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        // -----Defined Event Listners ----
        // OrderShiped::class => [
        //     SendEmailNotificationToUser::class,
        // ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        // --------- Secound method to define event listners using classes (classs based) -----
            // Event::listen(
            //     OrderShiped::class,[
            //         SendEmailNotificationToUser::class, 'handle'
            //     ]
            // );

        // ------ 3rd method to register events and listners using functions (closure based) --------
        // Event::listen(function(OrderShiped $event){
        //     parent::boot($event);
        // });
    }

    /**
     * Determine if events and listeners should be automatically discovered. (Do not need to register an event if using it )
     *
     * @return bool
     */
    public function shouldDiscoverEvents(){
        return true;
    }

    protected function discoverEventsWithin()
    {
        // dd('ok1', $this->app->path('jobs'));
        return [
            $this->app->path('Listeners'),
        ];
    }
}
