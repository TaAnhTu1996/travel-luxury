<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailBookingFinish extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;
    public $link;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($booking, $link)
    {
        $this->booking = $booking;
        $this->link = $link;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.booking-finish')->with([
            'booking' => $this->booking,
            'link' => $this->link
        ]);
    }
}
