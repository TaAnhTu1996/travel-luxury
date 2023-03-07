<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailUpdateBookingToCustomer extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $booking;
    public $tour;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $booking, $tour)
    {
        $this->name = $name;
        $this->booking = $booking;
        $this->tour = $tour;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.update-booking-to-customer')->with([
            'name' => $this->name,
            'booking' => $this->booking,
            'tour' => $this->tour
        ]);
    }
}
