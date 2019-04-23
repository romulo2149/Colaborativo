<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notificacion;
use Illuminate\Support\Facades\Auth;

class NotificacionesController extends Controller
{
    public function get($id)
    {
        $res = [];
        $contadorMensaje = 0;
        $contadorProyecto = 0;
        $notificacion = Notificacion::where('usuario', $id)->get();
        foreach($notificacion as $n)
        {
            if($n['tipo'] == "mensaje" && $n['leido'] == 0)
            {
                $contadorMensaje++;
            }
            if($n['tipo'] == "proyecto" && $n['leido'] == 0)
            {
                $contadorProyecto++;
            }
        }
        return response()->json(['mensaje' => $contadorMensaje, 'proyecto' => $contadorProyecto]);
    }

    public function nueva(Request $request)
    {
        $notificacion = new Notificacion;
        $notificacion->usuario = auth()->id();
        $notificacion->tipo = $request->tipo;
        $notificacion->save();
    }

    public function leida(Request $request)
    {
        Notificacion::where(['usuario'=> $request->id, 'tipo' => $request->tipo])->update(['leido' => '1']);
    }

    public function chat()
    {
        Notificacion::where(['usuario'=> Auth::user()->id, 'tipo' => 'mensaje'])->update(['leido' => '1']);
        return view('chat');
    }
}
