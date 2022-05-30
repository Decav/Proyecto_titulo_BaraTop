<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Oferta;
use App\Models\Postproducto;

class OfertasController extends Controller
{
    //

    public function crearOferta(Request $request){
        //$postproducto = Postproducto::findOrFail($request->postproducto);
        $request->validate([
            'postproducto' => ['unique:ofertas,postproducto_id'],
            'descuento' => ['required','numeric','gte:1','lte:90'],
            
        ]);
        $oferta = Oferta::create([
            'postproducto_id' => $request->postproducto,
            'descuento' => $request->descuento,
            
        ]);
        return redirect()->route('administrar_negocio');
    }
    public function getOfertas(){
        $ofertas = Oferta::all();
        foreach($ofertas as $oferta){
            $postproducto = $oferta->load('postproducto');
        }
        return $ofertas;
    }

    public function getOfertasNegocio(Request $request){

        $postproductos = Negocio::findOrFail($request->negocio);
        $ofertas = [];
        foreach($postproductos as $postproducto){
            array_push($ofertas, $postproducto->oferta()->get());
        }

        return $ofertas;
    }


    public function eliminarOferta(Oferta $oferta){
        $oferta->delete();
        return redirect()->route('ofertas');
    }

}
