<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Message;
use App\Events\NewMessage;
use App\Contactos;
use App\Notificacion;

class ContactsController extends Controller
{

    public function nuevo(Request $request)
    {
        $checar = Contactos::where([['usuario', '=', auth()->id()],['contacto', '=', $request->id_user ]])->get();
        if($checar->isEmpty())
        {
            $contacto = new Contactos;
            $contacto->usuario = auth()->id();
            $contacto->contacto = $request->id_user;
            $contacto->save();
            $contacto = new Contactos;
            $contacto->contacto = auth()->id();
            $contacto->usuario = $request->id_user;
            $contacto->save();
        }
        return redirect()->to('detallesproyectofreelancer');
    }
    public function get()
    {
        // get all users except the authenticated one
        $c = [];
        $contactos = Contactos::where('usuario', '=', auth()->id())->get();

        foreach ($contactos as $con) 
        {
            array_push($c, $con['contacto']);
        }

        $contacts = User::whereIn('id', $c)->get();

        // get a collection of items where sender_id is the user who sent us a message
        // and messages_count is the number of unread messages we have from him
        $unreadIds = Message::select(\DB::raw('`from` as sender_id, count(`from`) as messages_count'))
            ->where('to', auth()->id())
            ->where('read', false)
            ->groupBy('from')
            ->get();

        // add an unread key to each contact with the count of unread messages
        $contacts = $contacts->map(function($contact) use ($unreadIds) {
            $contactUnread = $unreadIds->where('sender_id', $contact->id)->first();

            $contact->unread = $contactUnread ? $contactUnread->messages_count : 0;

            return $contact;
        });


        return response()->json($contacts);
    }

    public function getMessagesFor($id)
    {
        // mark all messages with the selected contact as read
        Message::where('from', $id)->where('to', auth()->id())->update(['read' => true]);

        // get all messages between the authenticated user and the selected user
        $messages = Message::where(function($q) use ($id) {
            $q->where('from', auth()->id());
            $q->where('to', $id);
        })->orWhere(function($q) use ($id) {
            $q->where('from', $id);
            $q->where('to', auth()->id());
        })
        ->get();

        return response()->json($messages);
    }

    public function send(Request $request)
    {
        
        $message = Message::create([
            'from' => auth()->id(),
            'to' => $request->contact_id,
            'text' => $request->text
        ]);


        broadcast(new NewMessage($message));
        $notificacion = new Notificacion;
        $notificacion->usuario = $request->contact_id;
        $notificacion->tipo = 'mensaje';
        $notificacion->leido = 0;
        $notificacion->save();
        return response()->json($message);
    }
}
