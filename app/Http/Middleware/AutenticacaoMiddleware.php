<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $metodo_autenticacao, $perfil)
    {
        echo "PERFIL: {$perfil}<hr>";

        if($metodo_autenticacao == "padrão"){
            echo "Verificar o usuário no banco de dados <hr>";
        }
        if($metodo_autenticacao == "ldap"){
            echo "Verificar o usuário e senha no AD <hr>";
        }

        if(false){
            return $next($request);
        }else{
            return Response("Acesso negado! Rota exige autenticação");
        }
    }
}
