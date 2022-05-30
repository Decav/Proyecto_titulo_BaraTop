<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Models\Negocio;
use App\Models\User;
use App\Models\Postproducto;
use App\Models\Feedback;

class NegociosController extends Controller
{
    public function crearNegocios(Request $request){
        // $input = $request->all();
        // $negocio = new Negocio();
        // $negocio->patente = $input["patente"];
        // $negocio->nombre = $input["nombre"];
        // $negocio->direccion = $input["direccion"];
        // $negocio->telefono = $input["telefono"];
        
        // $negocio->save();
        // return $negocio;

        $request->validate([
            'patente' => ['required', 'string', 'unique:negocios'],
            'nombre' => ['required', 'string', 'min:8','max:64'],
            'direccion' => ['required', 'string', 'min:8', 'max:64'],
            'comuna' => ['required', 'string'],
            'telefono' => ['required', 'numeric', 'unique:negocios', 'digits:9']
        ]);

        $negocio = Negocio::create([
            'rut' => Auth::user()->rut,
            'patente' => $request->patente,
            'nombre' => $request->nombre,
            'direccion' => $request->direccion,
            'comuna' => $request->comuna,
            'telefono' => $request->telefono,

        ]);

        
        $user = Auth::user();
        $user->role = 3;
        $user->save();


        return redirect()->route('publicar_negocio');
    }


    public function editarTelefonoNegocio(Negocio $negocio, Request $request){

        $negocio->telefono = $request->telefono;
        $negocio->save();
        return redirect()->route('administrar_negocio');;

    }

    public function getNegocio(){
        $negocio = Negocio::all();
        return $negocio;
    }
    public function eliminarNegocio(Negocio $negocio){
        // $input = $request->all();
        // $patente = $input["patente"];
        // $rut = $input["rut"];
        // $usuario = User::where('rut', $rut)->first();
        // $negocio = Negocio::findOrFail($patente)->first();
        // $usuario->role = 0;


        //$usuario->save();
        $negocio->delete();
        return "ok";
    }

    //Funciones de Relacion

    public function setUsuario(Request $request){

        $negocio = Negocio::findOrFail($request->patente);
        $usuario = User::findOrFail($request->user_id);
        $negocio->usuario()->attach($usuario->id);
        return $negocio;

    }

    public function getUsuario(Negocio $negocio){

        return $negocio->usuario()->get();
    }


    public function addPostProducto(Request $request){

        $negocio = Negocio::findOrFail($request->patente);
        $postproducto = Postproducto::findOrFail($request->postprod_id);
        $negocio->postproductos()->attach($postproducto->id);
        return $negocio;
        
    }
    
    public function getPostProductos(Negocio $negocio){
        return $negocio->postproductos()->get();
    }


    public function removePostProducto(Negocio $negocio, Request $request){

        $postproducto = PostProducto::findOrFail($request->postprod_id);
        $negocio->postproductos()->detach($postproducto->id);
        return $negocio;
    }

    public function addFeedback(Request $request){

        $negocio = Negocio::findOrFail($request->patente);
        $feedback = Feedback::findOrFail($request->feedback_id);
        $negocio->feedbacks()->attach($feedback->id);
        return $negocio;

    }

    public function getFeedback(Negocio $negocio){
        $feedbacks = $negocio->feedbacks()->get();
        foreach($feedbacks as $feedback){
            $feedback->load('usuario');
        }
        return $feedbacks;
    }

    public function removeFeedback(Negocio $negocio, Request $request){
        
        $feedback = Feedback::findOrFail($request->feedback_id);
        $negocio->feedbacks()->detach($feedback->id);
        return $negocio;
    }

    public function getComunas(){
        $client = new Client();
        $response = $client->get('https://apis.digital.gob.cl/dpa/comunas', []);
        

        return $response->getBody();
    }
}
