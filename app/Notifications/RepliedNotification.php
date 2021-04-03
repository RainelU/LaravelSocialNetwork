<?php

namespace Laravel\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Carbon\Carbon;

class RepliedNotification extends Notification
{
    use Queueable;

    protected $user_sended, $user_sended_id;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user_sended, $user_sended_id)
    {
        $this->user_sended = $user_sended;
        $this->user_sended_id = $user_sended_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'user_sended' => $this->user_sended,
            'user_sended_id' => $this->user_sended_id,
            'user' => $notifiable
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
