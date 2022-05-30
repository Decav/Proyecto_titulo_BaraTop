<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Negocio extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'negocios';
    protected $primaryKey = 'patente';
    public $incrementing = false;

    public function usuario(){

        return $this->belongsTo(User::class);
    }

    public function postproductos(){
        return $this->belongsToMany(Postproducto::class, "negocio_postproducto", "negocio_id", "postproducto_id");
    }

    public function feedbacks(){
        return $this->belongsToMany(Feedback::class, "feedback_negocio", "negocio_id", "feedback_id");
    }
}
