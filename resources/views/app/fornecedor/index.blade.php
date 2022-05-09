<h3>Fornecedor</h3>

{{-- Fica o comentário que será descartado pelo interpretador do blade --}}

@php

@endphp


@isset($fornecedores)
@forelse($fornecedores as $fornecedor)
{{--@dd($loop) --}}
    Iteração atual: {{ $loop->iteration }}
    <br>
    Fornecedor: {{ $fornecedor['nome'] }}
    <br>
    Status: {{ $fornecedor['status'] }}
    <br>
    CNPJ: {{ $fornecedor['cnpj'] ?? 'Dado não foi preenchido'}}
    <br>
    Telefone: ({{ $fornecedor['ddd'] ?? " "}}) {{ $fornecedor['telefone'] ?? "" }}
    @switch($fornecedor['ddd'])
        @case('41')
            Curitiba - PR
            @break
        @case('42')
            Ponta Grossa - PR
            @break
        @case('47')
            Florianopolis - SC
            @break
        @default
            DDD Não Encontrado
    @endswitch
    <br>
    @if($loop->first)
    Primeira iteração
    @endif
    @if($loop->last)
    Última iteração
    <br>
    Total: {{$loop->count}}
    @endif
    <hr>
    <!--
    $variavel testada não estiver definida
    ou
    $variavel testada possui o valor null

    Para escapar a tag de impressão do php inserir @.
    exemplo @{{ }}
     -->
    @empty
        Não existem fornecedores cadastrados!!
    @endforelse
@endisset



{{-- @dd($fornecedores) --}}