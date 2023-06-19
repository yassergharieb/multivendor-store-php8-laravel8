<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VendorAcountCreationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

     public $vendor; 
    public function __construct($vendor)
    {

     $this->vendor =  $vendor;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {


        $vendor_name =  $this->vendor->name;
        return $this->view('emails.welcomeVendorRegister' , compact('vendor_name'));
    }
}
