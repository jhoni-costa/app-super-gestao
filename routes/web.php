<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LogAcessoMiddleware;

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
// Route::post('/contato',[\App\HTTP\Controllers\ContatoController::class,'contato'])->name('site.contato');
Route::post('/contato',[\App\HTTP\Controllers\ContatoController::class,'salvar'])->name('site.contato');

Route::get('/login/{erro?}',[\App\HTTP\Controllers\LoginController::class, 'index'])->name('site.login');
Route::post('/login',[\App\HTTP\Controllers\LoginController::class, 'autenticar'])->name('site.login');

Route::middleware('autenticacao:padrao,visitante')->prefix('/app')->group(function(){
    // middleware('log.acesso','autenticacao')
    Route::get('/home',[\App\HTTP\Controllers\HomeController::class,'index'])->name('app.home');
    Route::get('/sair',[\App\HTTP\Controllers\LoginController::class,'sair'])->name('app.sair');
    Route::get('/cliente',[\App\HTTP\Controllers\ClienteController::class,'index'])->name('app.cliente');
    Route::get('/fornecedore',[\App\HTTP\Controllers\FornecedorController::class,'index'])->name('app.fornecedor');
    Route::get('/produto',[\App\HTTP\Controllers\ProdutoController::class,'index'])->name('app.produto');
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


