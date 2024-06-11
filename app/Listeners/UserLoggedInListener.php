<?php

namespace App\Listeners;

use App\Events\UserLogInEvent;
use App\Models\AuditLog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UserLoggedInListener
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
    public function handle(UserLogInEvent $event)
    {
        $data = [
            'user_id' => $event->user->user_id,
            'action' => 'USER LOGGED IN',
        ];

        $auditLog = new AuditLog();
        $auditLog->fill($data)->save();
        return $auditLog;
    }
}
