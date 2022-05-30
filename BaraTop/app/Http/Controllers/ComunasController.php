<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comuna;


class ComunasController extends Controller
{
    

    public function getComunas(){
        return Comuna::all();
    }
}
