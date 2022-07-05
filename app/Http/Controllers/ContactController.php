<?php

namespace App\Http\Controllers;

use App\Mail\ContactusMail;

use Sentinel;
use Mail;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //


    public function sendEmail(Request $request)
    {
        Mail::to('info@olliepayments.com')->send(new  ContactusMail($request->contactemail,$request->contactname,$request->contactmessage));
        return redirect()->back()->with('flash_message','Thank you for your message .');
    }
}
