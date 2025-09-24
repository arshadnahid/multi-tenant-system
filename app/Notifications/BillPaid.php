<?php

namespace App\Notifications;

use App\Models\Bill;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BillPaid extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(public Bill $bill)
    {
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Bill paid')
            ->line('A bill has been marked as paid.')
            ->line('Building Flat: '.$this->bill->flat->flat_number)
            ->line('Category: '.$this->bill->category->name)
            ->line('Month: '.$this->bill->month)
            ->line('Amount: '.$this->bill->amount);
    }
}


