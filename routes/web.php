<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Verbos HTTP
| get | post | put | patch | delete | options 
*/
/*
Route::get('/', function () {
    return "<h1>Olá mundo!</h1>";
});
*/
Route::get('/',[\App\HTTP\Controllers\PrincipalController::class,'principal'])->name('site.index');
Route::get('/sobre-nos',[\App\HTTP\Controllers\SobreNosController::class,'sobreNos'])->name('site.sobrenos');
Route::get('/contato',[\App\HTTP\Controllers\ContatoController::class,'contato'])->name('site.contato');
Route::post('/contato',[\App\HTTP\Controllers\ContatoController::class,'contato'])->name('site.contato');
Route::get('/login',function(){return 'Login';})->name('site.login');

Route::prefix('/app')->group(function(){
    Route::get('/clientes',function(){return 'Clientes';})->name('app.clientes');
    Route::get('/fornecedores',[\App\HTTP\Controllers\FornecedorController::class,'index'])->name('app.fornecedor');
    Route::get('/produtos',function(){return 'Produtos';})->name('app.produtos');
});

Route::get('/teste/{p1}/{p2}',[\App\HTTP\Controllers\TesteController::class,'teste'])->name('teste');


Route::fallback(function(){
    echo "A rota acessada não existe: <a href=".route('site.index').">Clique aqui </a> para ir para a pagina principal";
});

/*

Route::get('/contato/{nome}/{caterogia_id}',
    function(string $nome, int $categoria_id = 1){
        echo "<pre>";
        echo "Estamos aqui : {$nome}";
        echo "<br>";
        echo "Category: {$categoria_id}";
        echo "</pre>";
    }
)->where('caterogia_id','[0-9]+')->where('nome','[A-Za-z]+');*/


