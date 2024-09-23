<?php

namespace App\Listeners;

use App\Events\PostCreated;
use App\Mail\UserMail;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class NotifyUser
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PostCreated $event): void
    {
        $users = User::all();
        $user = [];
        Cache::put('users', $users, 10);
        foreach ($users as $user) {
            Mail::to($user->email)->send(new UserMail($event->post));

        }
    }
}
