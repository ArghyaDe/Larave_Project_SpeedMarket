<?php

namespace App\Notifications;

use App\Seller;
use App\Supply;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PaymentReceived extends Notification
{
    use Queueable;

    protected $supply;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($supply_att)
    {
        // dd((array)$supply_att->supply);
        $this->supply = $supply_att->supply;
        // dd($this->supply->seller_id);
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        // dd($notifiable);
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Payment Received')
            ->greeting('Thanks for Purches!!')
            ->line('You have purchesed '. $this->supply->product->name . ' from ' . $this->supply->seller->seller->first()->company_name .
            ' manufactured by ' . $this->supply->product->manufacturer->company_name)
            ->action('Login', url('/'))
            ->line('Thanks!');
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
            'supplier' => Seller::find($this->supply->seller_id)->company_name,
            'price' => $this->supply->price
        ];
    }
}
