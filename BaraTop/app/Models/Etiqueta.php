<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etiqueta extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function productos(){
        return $this->belongsToMany(Producto::class, "etiqueta_producto", "producto_id", "etiqueta_id");
    }
}
