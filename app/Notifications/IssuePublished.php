<?php

namespace App\Notifications;

use App\Issue;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class IssuePublished extends Notification
{
    use Queueable;

    /**
     * User
     *
     * @var Authenticatable
     **/
    public $user;

    /**
     * Issue
     *
     * @var Issue
     **/
    public $issue;

    /**
     * Create a new notification instance.
     *
     * @param Authenticatable $user
     * @var Issue $issue
     *
     * @return void
     */
    public function __construct($user, $issue)
    {
        $this->user = $user;
        $this->issue = $issue;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject($this->issue->title . ' ' . __('is Published!'))
            ->line($this->issue->title . ' ' . __('is Published!'))
            ->line(__('If you haven\'t purchased it yet, click the button below to buy it!'))
            ->action($this->issue->title, route('issues.show', $this->issue->slug));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
