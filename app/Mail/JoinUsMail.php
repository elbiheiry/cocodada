<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class JoinUsMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name , $email , $phone)
    {
        //
        $this->email = $email;
        $this->name = $name;
        $this->phone = $phone;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('site.email.join' ,
            [
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone
            ])
            ->subject('New join request')
            ->from($this->email , $this->name);
    }
}
