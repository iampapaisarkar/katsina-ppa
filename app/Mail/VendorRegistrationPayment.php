<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VendorRegistrationPayment extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->newData = $data;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if($this->newData['type'] == 'vendor-registration'){
            $subject = 'Payment Query – Katsina State BPP Portal';
        }

        return $this->markdown('mail.vr-payment',['data'=>$this->newData])->subject($subject);
    }
}
