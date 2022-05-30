<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Etiqueta;

class ProductosController extends Controller
{
    public function crearProductos(Request $request){
        
        $request->validate([
            'nombre' => ['required', 'string', 'max:32'],
            'descripcion' =>['required','string','max:512'],
            'marca' =>['required','string'],
            'etiquetas' =>['required','array']


        ]);
        
        $producto = Producto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'marca' => $request->marca,
            'etiquetas' => "",
        ]);

        $etiquetas = Etiqueta::whereIn('nombre', $request->etiquetas)->get();
        foreach($etiquetas as $etiqueta){
            $producto->etiquetas()->attach($etiqueta->id);
        }
        
        return redirect()->route('producto');
    }

    public function getProducto(){
        $productos = Producto::all();
        foreach($productos as $producto){
            $producto->load("etiquetas");
        }
        return $productos;
    }

    public function eliminarProducto(Request $request){
        $input = $request->all();
        $id = $input["id"];
        $producto = Producto::findOrFail($id);
        $etiquetas = $producto->etiquetas()->get();
        foreach($etiquetas as $etiqueta){
            $producto->etiquetas()->detach($etiqueta->id);
        }


        $producto->delete();
        return "ok";
    }


    //Funciones de Relacion

    public function addEtiqueta(Request $request){

        $producto = Producto::findOrFail($request->producto_id);
        $etiqueta = Etiqueta::findOrFail($request->etiqueta_id);
        $producto->etiquetas()->attach($etiqueta->id);
        return $producto;
    }

    public function getEtiquetas(Producto $producto){
        return $producto->etiquetas()->get();
    }




}
