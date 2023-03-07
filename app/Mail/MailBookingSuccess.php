<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailBookingSuccess extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $tour;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $tour)
    {
        $this->name = $name;
        $this->tour = $tour;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.booking-success')->with([
            'name' => $this->name,
            'tour' => $this->tour,
        ]);
    }
}
