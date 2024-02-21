<?php

namespace App\Shared\Trait;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Slack\SlackRoute;

trait Slack
{
    public function routeNotificationForSlack(Notification $notification): SlackRoute
    {
        return SlackRoute::make(
            $notification->notification->preferences['CHANNELS_SLACK'],
            $notification->notification->preferences['TOKEN_SLACK']
        );
    }
}
