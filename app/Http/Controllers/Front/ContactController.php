<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use Mail;


class ContactController extends Controller
{

    public function messageContact(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'phone'     => 'required',
        ]);


        $message  = $request->message;
        $mailfrom = $request->email;
       
        $message = new Message();
        $message->name  = $request->name;
        $message->email  = $request->email;
        $message->phone  = $request->phone;
        // $message->reason  = $request->reason;
        $message->subject  = $request->subject;
        $message->body  = $request->body;
        $message->save();

        //$adminname  = User::find(1)->name;
        //$mailto     = $request->mailto;

      //  Mail::to($mailto)->send(new Contact($message,$adminname,$mailfrom));
        // Mail::to('contact@coincalin.ma')->send( new \App\Mail\ContactMail($message));

        return redirect()->back()->with( ['message' => __('Merci!, Votre demande a été bien enregistrée ') ] );

    }
   
}
