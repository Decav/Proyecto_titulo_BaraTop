<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function usuario(){

        return $this->belongsToMany(User::class, "reporte_user", "reporte_id", "user_id");
    }




}
