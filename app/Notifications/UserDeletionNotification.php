<?php

namespace App\Notifications;

// app/Notifications/UserDeletionNotification.php

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class UserDeletionNotification extends Notification
{
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('Your account is scheduled for deletion in 24 hours.')
            ->line('If you wish to continue using our service, please log in and update your account information.')
            ->line('If you believe this is a mistake, please contact our support team.')
            ->line('Thank you for being a part of our community.');
    }
}
