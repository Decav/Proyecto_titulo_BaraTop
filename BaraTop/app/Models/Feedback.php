<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $table = "feedbacks";

    public function usuario(){
        return $this->belongsTo(User::class);
    }

    public function negocios(){
        return $this->belongsToMany(Negocio::class, "feedback_negocio", "feedback_id", "negocio_id");
    }
}
