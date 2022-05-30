<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reporte;
use App\Models\User;

class ReportesController extends Controller
{
    public function crearReportes(Request $request){
        
        $request->validate([
            'asunto' => ['required', 'string', 'max:128'],
            'texto' =>['required', 'string', 'max:512'],
            'tipo' =>['required', 'integer']
        ]);

        $reporte = Reporte::create([
            'rut' => Auth::user()->rut,
            'asunto' => $request->asunto,
            'texto' => $request->texto,
            'tipo' => $request->tipo,
            'estado' => 0,
            'respuesta' => "",
        ]);

        $user = User::findOrFail(Auth::user()->id);
        $reporte->usuario()->attach($user->id);

        return redirect()->route('soporte_reporte');
    }

    public function getReporte(){
        $reporte = Reporte::all();
        return $reporte;
    }

    public function getReporteRut(String $rut){
        $rut = strtolower($rut);
        $reporte = Reporte::where('rut', $rut)->get();
        return $reporte;
    }

    public function eliminarReporte(Request $request){
        $input = $request->all();
        $id = $input["id"];
        $reporte = Reporte::findOrFail($id);

        $users = $reporte->usuario()->get();

        foreach($users as $user){
            $reporte->usuario()->detach($user->id);
        }
        


        $reporte->delete();
        return "ok";
    }

    public function update(Reporte $reporte){

        $attribs = request()->validate([
            'respuesta' => ['required', 'string', 'max:1024'],

        ]);

        $reporte->estado = 1;
        $reporte->save();
        $reporte->update($attribs);

        return back();
    }


    public function setEstado(Reporte $reporte, Request $request){


        $reporte->estado = $request->estado;
        $reporte->save();
        return $reporte;
    }

    //Funciones de Relacion

    public function setUsuario(Request $request){
        $favorito = Favorito::findOrFail($request->favorito_id);
        $usuario = User::findOrFail($request->user_id);
        $favorito->usuario()->attach($usuario->id);
        return $favorito;
    }
    
    public function getUsuario(Reporte $reporte){

        return $reporte->usuario()->get();

    }

}
