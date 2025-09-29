<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DueDateMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $due_date;

    /**
     * Create a new message instance.
     */
    public function __construct($user, $due_date)
    {
        $this->user = $user;
        $this->due_date = $due_date;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Reminder: Your due date is approaching')
            ->view('emails.due_date_reminder');
    }
}
