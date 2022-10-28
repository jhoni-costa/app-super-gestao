<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fornecedor;

class FornecedorController extends Controller
{
    public function index()
    {
        return view('app.fornecedor.index');
    }

    public function listar(Request $request)
    {
        $fornecedores = Fornecedor::where('nome', 'like', "%{$request->nome}")
            ->where('site', 'like', "%{$request->site}")
            ->where('uf', 'like', "%{$request->uf}")
            ->where('email', 'like', "%{$request->email}")
            ->get();
        // dd($fornecedores);
        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores]);
    }

    public function editar($id, $msg = "")
    {
        $fornecedor = Fornecedor::find($id);

        return view("app.fornecedor.adicionar", ['fornecedor' => $fornecedor, 'msg' => $msg]);
    }

    public function adicionar(Request $request)
    {
        $msg = "";
        ## Inclusão
        if ($request->input("_token") != '' && $request->input('id') == '') {
            $regras = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email'
            ];

            $feedback = [
                'required' => "O campo : attribute deve ser preenchido",
                'nome.min' => "O campo Nome deve ter no minimo 3 caracteres",
                'nome.max' => "O campo Nome deve ter no máximo 40 caracteres",
                'uf.min' => "O campo UF deve ter no minimo 2 caracteres",
                'uf.max' => "O campo UF deve ter no máximo 2 caracteres",
                'email.email' => "O campo e-mail não foi preenchido corretamente",
            ];

            $request->validate($regras, $feedback);

            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());

            $msg = "Fornecedor cadastrado com sucesso!";
        }

        ## Edição 
        if ($request->input("_token") != '' && $request->input('id') != '') {
            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());

            if ($update) {
                $msg = "Update realizado com sucesso";
            } else {
                $msg = "Erro ao atualizar fornecedor";
            }
            return redirect()->route('app.fornecedor.editar', ['id' => $request->input('id'), 'msg' => $msg]);
        }

        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }
}
