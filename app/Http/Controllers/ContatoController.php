<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;

class ContatoController extends Controller{
    
    public function contato(Request $request){
        // echo "<pre>";
        // print_r($request->all());
        
        // $contato = new SiteContato();
        // $contato->fill($request->all());
        // $contato->save(); 

        /*
        $contato = new SiteContato();
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');
        
        $contato->save(); */
        // print_r($contato->getAttributes());

        // echo "</pre>";

        return view('site.contato',['titulo'=>'Contato']);
    }

    public function salvar(Request $request){
        $request->validate([
           'nome' => 'required',
           'telefone' => 'required',
           'email' => 'required',
           'motivo_contato' =>'required',
           'mensagem' => 'required'
        ]);

        // SiteContato::create($request->all());
    }
}
