<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorito extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'negocio_patente'];
    

    public function usuarios(){

        return $this->belongsToMany(User::class, "favorito_user",  "favorito_id", "user_id");
    }

    public function negocio(){
        return $this->belongsTo(Negocio::class);
    }
}
