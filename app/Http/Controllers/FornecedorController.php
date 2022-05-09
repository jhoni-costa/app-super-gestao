<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index(){
        $fornecedores = [
            0 => [
                'nome'=>'Fornecedor 1',
                'status'=>'N',
                'cnpj'=>'00.000.0000/0000-00',
                'ddd'=>'41',// Curitiba
                'telefone'=>'9944-0442'
            ],
            1 => [
                'nome'=>'Fornecedor 2',
                'status'=>'S',
                'cnpj'=> null,
                'ddd'=>'42', // Ponta Grossa
                'telefone'=>'0000-0000'
            ],
            2 => [
                'nome'=>'Fornecedor 3',
                'status'=>'S',
                'cnpj'=> null,
                'ddd'=>'47', // Florianopolis
                'telefone'=>'0000-0000'
            ]
        ];
        
        return view('app.fornecedor.index',compact('fornecedores'));
    }
}
