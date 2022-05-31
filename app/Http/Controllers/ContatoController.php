<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContatoController extends Controller{
    
    public function contato(){
        echo "<pre>";
        var_dump($_POST);
        echo "</pre>";
        return view('site.contato',['titulo'=>'Contato']);
    }
}
