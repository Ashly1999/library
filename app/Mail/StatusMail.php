<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StatusMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $status;
    public $title;
  


    /**
     * Create a new message instance.
     */
    public function __construct($user, $status, $title)
    {
        $this->user = $user;
        $this->status = $status;
        $this->title = $title;
       
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Status Mail')
            ->view('emails.status')
            ->with([
                'user' => $this->user,
                'status' => $this->status,
                 'title'=>$this->title,
                
            ]);
    }
}
