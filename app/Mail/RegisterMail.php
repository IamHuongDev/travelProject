<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterMail extends Mailable
{
    use Queueable, SerializesModels;

    public $tieu_de;

    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($tieu_de, $data)
    {
        $this->tieu_de            = $tieu_de;
        $this->data              = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.register', ['data' => $this->data])->subject($this->tieu_de);
    }
}
