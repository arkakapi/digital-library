<?php

namespace App\Notifications;

use App\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class Purchased extends Notification
{
    use Queueable;

    /**
     * User
     *
     * @var Authenticatable
     **/
    public $user;

    /**
     * Order
     *
     * @var Order
     **/
    public $order;

    /**
     * Create a new notification instance.
     *
     * @param Authenticatable $user
     * @param Order $order
     *
     * @return void
     */
    public function __construct($user, $order)
    {
        $this->user = $user;
        $this->order = $order;
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
            ->subject(__('Order') . ' #' . $this->order->id)
            ->line(__('You are receiving this email because you are purchased new issue(s).'))
            ->line(__('Product') . ': ' . $this->order->product)
            ->line(__('Issues') . ': ' . implode(', ', $this->order->issues))
            ->line(__('Total') . ': ' . $this->order->total . ' ' . ($this->order->language == 'tr' ? 'TL' : 'USD'))
            ->line(__('Date') . ': ' . $this->order->created_at)
            ->action(__('See My Purchased'), route('my-purchases'));
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
