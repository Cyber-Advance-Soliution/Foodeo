<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;


class OrderNotification extends Notification implements ShouldQueue
{
    use Queueable;
	
    
    public $neworder;
    public $canceleorder;
    public $orderComplaint;
   

    public function __construct($neworder,$canceleorder,$orderComplaint)
    {
       
        $this->neworder=$neworder;
        $this->canceleorder=$canceleorder;
        $this->orderComplaint=$orderComplaint;
       
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

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
 

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            
            'neworder'=>$this->neworder,
            'canceleOrder'=>$this->canceleorder,
            'orderComplaint'=>  $this->orderComplaint,
        ];
    }
	
	
}
