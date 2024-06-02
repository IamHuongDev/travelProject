<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $tieu_de;

    public $data;

    public function __construct($tieu_de, $data)
    {
        $this->tieu_de            = $tieu_de;
        $this->data              = $data;
    }

    public function build()
    {
        return $this->view('mail.resetPassword', ['data' => $this->data])->subject($this->tieu_de);
    }
}
