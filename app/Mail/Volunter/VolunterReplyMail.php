<?php

namespace App\Mail\Volunter;

use App\Mail\Investment\InvestmentReplyMail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VolunterReplyMail extends Mailable
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
        return $this->from($this->company['email'],$this->company['name'])->subject('You want to volunteer in'.$this->data['eventTitle'].' ')->view('backend.email.volunterReply')->withData($this->data)->withCompany($this->company);

    }
}
