<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;
    public $details;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->markdown('emails.contactUs');

        return $this->from($this->details->email)
                ->markdown('emails.contactUs', [
                    'name' => $this->details->name,
                    'email' => $this->details->email,
                    'msg_subject' => $this->details->msg_subject,
                    'phone_number' => $this->details->phone_number,
                ]);
    }
}
