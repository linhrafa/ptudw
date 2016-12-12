<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Register extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $username, $faculty_name, $password, $link_active)
    {
        $this->username = $username;
        $this->faculty_name = $faculty_name;
        $this->link_active = $link_active;
        $this->name = $name;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('auth.RegisterMail')->with([
            'username' => $this->username,
            'faculty_name' => $this->faculty_name,
            'link_active' => $this->link_active,
            'name' => $this->name,
            'password' => $this->password,
        ]);
    }
}
