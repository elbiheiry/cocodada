<?php

namespace App\Mail;

use App\OtherForm;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OtherFormMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name , $email , $phone , $type)
    {
        //
        $this->email = $email;
        $this->name = $name;
        $this->phone = $phone;
        $this->type = $type;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('site.email.other_form' ,
            [
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'type' => $this->type
            ])
            ->subject($this->type.' mail')
            ->from($this->email , $this->name);
    }
}
