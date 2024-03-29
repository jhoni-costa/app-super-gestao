<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\Models\MotivoContato;


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
        $motivo_contatos = MotivoContato::all();
        
        return view('site.contato',['titulo'=>'Contato', 'motivo_contatos'=>$motivo_contatos]);
    }

    public function salvar(Request $request){
        $request->validate(
            [
                'nome' => 'required|min:3|max:40|unique:site_contatos',
                'telefone' => 'required',
                'email' => 'email',
                'motivo_contatos_id' =>'required',
                'mensagem' => 'required|max:2000'
            ],
            [
                'nome.min' => 'O campo nome precisa ter no minimo 3 caracteres',
                'nome.max' => 'O campo nome precisa ter no máximo 40 caracteres',
                'nome.unique' => 'O nome inserido já consta no banco de dados',
                'mensagem.max' => 'O campo mensagem não pode contar mais de 2000 caracteres',
                'email' => 'O email informado não é valido',
                'required' => 'O campo :attribute precisa ser preenchido'
            ]
    );

        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
