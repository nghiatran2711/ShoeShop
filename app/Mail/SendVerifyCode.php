<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendVerifyCode extends Mailable
{
    use Queueable, SerializesModels;

    private $orderInfo = [];
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($orderInfo)
    {
        $this->orderInfo = $orderInfo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = [];
        $data['orderInfo'] = $this->orderInfo;

        return $this->view('emails.carts.send_verify_code', $data);
    }
}
