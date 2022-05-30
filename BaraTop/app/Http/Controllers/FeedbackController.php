<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\Negocio;
use App\Models\User;

class FeedbackController extends Controller
{
    //

    public function crearFeedback(Request $request){
        
        $request->validate([
            'comentario' => ['required', 'string', 'max:255'],
        ]);

        $negocio = Negocio::findOrFail($request->patente);
        $negocio_feedback = $negocio->feedbacks()->where('usuario_id', Auth::user()->id)->first();


        if($negocio_feedback == null){
            $feedback = new Feedback();
            $feedback->usuario_id = Auth::user()->id;
            $feedback->calificacion = $request->calificacion;
            $feedback->comentario = $request->comentario;
            $feedback->save();

            $feedback->negocios()->attach($negocio->patente);
        }else{

            $negocio_feedback->calificacion = $request->calificacion;
            $negocio_feedback->comentario = $request->comentario;
            $negocio_feedback->save();
        }
        

        return redirect()->route('negocio', $negocio->patente);
    }


    public function getFeedback(){
        $feedbacks = Feedback::all();
        foreach($feedbacks as $feedback){
            $feedback->load('usuario');
        }
        return $feedbacks;
    }
    
    public function setUsuario(Request $request){
        $fb = Feedback::findOrFail($request->feedback_id);
        $usuario = User::findOrFail($request->user_id);
        $fb->usuario()->attach($usuario->id);
        return $fb;
    }
    
    public function getUsuario(Feedback $fb){
        return $fb->usuario()->get();
    }



}
