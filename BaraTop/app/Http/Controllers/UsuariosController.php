<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Negocio;
use App\Models\Favorito;
use App\Models\Reporte;


class UsuariosController extends Controller
{
    //
    public function getUsuarios(){
        $Usuarios = User::all();
        return $Usuarios;
    }

    public function banUsuario(User $user){
        $user->role = -1;
        
        $negocio = Negocio::where('rut', $user->rut)->first();

        if($negocio != null){
            $negocio->delete();
        }


        $user->save();
        return "ok";
    }
    public function desbanUsuario(User $user){
        
        $user->role = 0;
        $user->save();
        return "ok";
    }
    
    public function setUsuarioCliente(User $user){
        $user->role = 0;
        $user->save();
        return $user;
    }

    public function setUsuarioVendedor(User $user){
        $user->role = 1;
        $user->save();
        return $user;
    }

    //Funciones de Relacion

    public function addNegocio(Request $request){
        $user = User::FindOrFail($request->user_id);
        $negocio = Negocio::FindOrFail($request->negocio_id);
        $user->negocio()->attach($negocio->patente);
        return $user;
    }
    
    public function getNegocio(User $user){
        return $user->negocio()->get();
    }


    public function addFavorito(Request $request){
        $user = User::FindOrFail($request->user_id);
        $favorito = Favorito::FindOrFail($request->favorito_id);
        $user->favoritos()->attach($favorito->id);
        return $user;
    }

    public function getFavoritos(User $user){
        return $user->favoritos()->get();
    }

    public function removeFavorito(User $user, Request $request){

        $favorito = Favorito::FindOrFail($request->favorito_id);
        $user->favoritos()->detach($favorito->id);
        return $user;
    }

    public function addReporte(Request $request){

        $user = User::FindOrFail($request->user_id);
        $reporte = Reporte::FindOrFail($request->reporte_id);
        $user->reportes()->attach($reporte->id);
        return $user;
    }

    public function getReportes(User $user){

        return $user->reportes()->get();
    }

    public function removeReporte(User $user, Request $request){

        $reporte = Reporte::FindOrFail($request->reporte_id);
        $user->reportes()->detach($reporte->id);
        return $user;
    }

    
}
