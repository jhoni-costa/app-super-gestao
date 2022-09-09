<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('site.login',['titulo'=>'Login']);
    }

    public function autenticar(Request $request){
        $regras = [
            'usuario' => 'email',
            'senha'=> 'required'
        ];
        $feedback = [
            'usuario.email' => 'O campo usuario (e-mail) é obrigatório',
            'senha.required' => 'O campo senha é obrigatório'
        ];

        $request->validate($regras, $feedback);

        print_r($request->all());
    }
}
