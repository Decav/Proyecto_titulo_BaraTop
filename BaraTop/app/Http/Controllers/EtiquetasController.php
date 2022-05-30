<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etiqueta;
class EtiquetasController extends Controller
{
    //
    public function crearEtiquetas(Request $request){
        
        $request->validate([
            'nombre' => ['required', 'string', 'max:32'],
        ]);
        $etiqueta = Etiqueta::create([
            'nombre' => $request->nombre,
                     
        ]);

        return redirect()->route('nueva_etiqueta');
    }
    public function getEtiqueta(){
        $etiqueta = Etiqueta::all();
        return $etiqueta;
    }

    public function eliminarEtiqueta(Request $request){
        $input = $request->all();
        $id = $input["id"];
        $etiqueta = Etiqueta::findOrFail($id);
        $productos = $etiqueta->productos()->get();

        foreach($productos as $producto){
            $producto->etiquetas->detach($etiqueta->id);
        }
        
        $etiqueta->delete();
        return "ok";
    }
}
