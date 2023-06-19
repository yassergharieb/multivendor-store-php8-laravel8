<?php

namespace App\Listeners;

use App\Events\VendorCreation;
use App\Mail\VendorAcountCreationMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailToVendor
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\VendorCreation  $event
     * @return void
     */
    public function handle(VendorCreation $event)
    {

     Mail::to($event->vendor->email)->send(new VendorAcountCreationMail($event->vendor)); 
    }
}
