<?php

namespace App\Listeners;

use App\Events\MessageWasReceived;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;

class SendNotificationToOwner
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
    public function handle(MessageWasReceived $event)
    {
        $message = $event->message;
        //obtieve el evento 
        Mail::send('emails.contact',['msg' => $message ], function($m) use ($message){
            // recibe tres parametros 1.la vista ,2 . un array con los datos que vamos a pasar la vista , 3. una funcion anonima que recibe los
            // los parametros del formulario
            $m->from($message->email, $message->name)
            ->to('edwardbrian96@gmail.com', 'Bryan')
            ->subject('bienvenido a mailtrap');
        });
    }
}
