<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'CRV Industrial';
        $fornecedor->site = 'www.crvindustrial.com';
        $fornecedor->uf = 'PR';
        $fornecedor->email = 'jaison@crvinduistrial.com';
        $fornecedor->save();

        Fornecedor::create([
            'nome' => 'Gerar Curitiba',
            'site' => 'www.gerar.com.br',
            'uf' => 'PR',
            'email' => 'jessicagerzewski@gerar.com.br'
        ]);

        Fornecedor::create([
            'nome'=>'Vista Soft' ,
            'site' => 'www.vistasoft.com.br',
            'uf' => 'SC',
            'email' => 'geral@vistasoft.com.br'
        ]);
    }
}
