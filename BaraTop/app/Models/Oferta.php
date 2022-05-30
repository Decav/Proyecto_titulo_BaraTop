<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    use HasFactory;

    protected $fillable = ['postproducto_id', 'descuento'];

    public function postproducto(){
        return $this->belongsTo(PostProducto::class);
    }
}
