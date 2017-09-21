<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Mail\PendingAuthorizationEmail;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class AdminNotifyRegistered
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserRegistered $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
        $admins = User::all()->where('is_admin', true)->pluck('email');
        Mail::to($admins)->send(new PendingAuthorizationEmail($event->user));
    }
}
