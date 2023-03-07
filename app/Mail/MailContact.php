<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailContact extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $content;

    /**
     * Create a new content instance.
     *
     * @return void
     */
    public function __construct($name, $email, $content)
    {
        $this->name = $name;
        $this->email = $email;
        $this->content = $content;
    }

    /**
     * Build the content.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.contact-email')->with([
            'name' => $this->name,
            'email' => $this->email,
            'content' => $this->content
        ]);
    }
}
