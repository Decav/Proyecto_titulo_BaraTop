<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postproducto extends Model
{
    use HasFactory;
    protected $fillable = ['precio', 'stock_referencial', 'producto_id'];
    
    public function negocio(){
        return $this->belongsToMany(Negocio::class, "negocio_postproducto", "postproducto_id", "negocio_id");
    }

    public function producto(){
        return $this->belongsTo(Producto::class);
    }

    public function oferta(){
        return $this->hasOne(Oferta::class);
    }
}
