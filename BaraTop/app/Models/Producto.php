<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    //protected $guarded = [];
    protected $fillable = ['id', 'nombre', 'descripcion', 'marca', 'etiquetas'];


    public function postproductos(){

        return $this->belongsTo(PostProducto::class);
    }

    public function etiquetas(){
        return $this->belongsToMany(Etiqueta::class, "etiqueta_producto", "producto_id", "etiqueta_id");
    }
}
