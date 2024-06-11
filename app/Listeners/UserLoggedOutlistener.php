<?php

namespace App\Listeners;

use App\Events\UserLoggedOutEvent;
use App\Models\AuditLog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UserLoggedOutlistener
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
    public function handle(UserLoggedOutEvent $event)
    {
        $data = [
            'user_id' => $event->user->user_id,
            'action' => 'USER LOGGED OUT',
        ];

        $auditLog = new AuditLog();
        $auditLog->fill($data)->save();
        return $auditLog;
    }
}
