<?php

namespace App\Listeners;

use App\Events\MessageWasReceived;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;


class SendAutoresponder
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
     * @param  MessageWasReceived  $event
     * @return void
     */
    public function handle(MessageWasReceived $event){
        
        $message = $event->message;
        if(auth()->check()){
            //sobreescribir la variable del email
            $message->email = auth()->user()->email;
        } 

        Mail::send('emails.contact',['msg' => $message ], function($m) use ($message){
            // recibe tres parametros 1.la vista ,2 . un array con los datos que vamos a pasar la vista , 3. una funcion anonima que recibe los
            // los parametros del formulario
            $m->to($message->email, $message->name)->subject('bienvenido a mailtrap');
        });
    }
}
