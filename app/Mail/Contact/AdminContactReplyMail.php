<?php

namespace App\Mail\Contact;

use App\Mail\AdminJobApplicationMail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminContactReplyMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $data,$company;
    public function __construct($data,$company)
    {
        $this->data=$data;
        $this->company= $company;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->company['email'],$this->company['name'])->subject('CC of  contact reply')->view('backend.email.adminContact')->withData($this->data)->withCompany($this->company);

    }
}
