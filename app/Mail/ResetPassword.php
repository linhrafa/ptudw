<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ResetPassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($vnu_email, $link_reset)
    {
        $this->vnu_email = $vnu_email;
        $this->link_reset = $link_reset;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('Auth.EmailResetPassword')->with([
            'vnu_email'=>$this->vnu_email,
            'link_reset'=>$this->link_reset,
        ]);
    }
}
