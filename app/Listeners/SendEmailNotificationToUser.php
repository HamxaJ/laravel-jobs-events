<?php

namespace App\Listeners;

use App\Events\OrderShiped;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendEmailNotificationToUser implements ShouldQueue
{
    public $delay = 5;
    // public $queue = 'listeners';
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        // dd('ok notification', $this->delay);
    }

    // public $delay

    /**
     * Handle the event.
     *
     * @param  OrderShiped  $event
     * @return void
     */
    public function handle(OrderShiped $event)
    {
        //
        // dd('fucntion handle is called by the delay of 60m secounds');
    }

    public function ShouldQueue(OrderShiped $event){
        if ($event->user->email === null) {
            return false;
        }
        return true;
    }

    /**
     * Handle a job failure.
     *
     * @param  \App\Events\OrderShipped  $event
     * @param  \Throwable  $exception
     * @return void
     */
    public function failed(OrderShiped $event, $exception)
    {
        dd($exception);
    }

    /**
     * Determine the time at which the listener should timeout.
     *
      * @return \DateTime
      */
    // public function retryUntil()
    // {
    //     return now()->addMinutes(5);
    // }
}
