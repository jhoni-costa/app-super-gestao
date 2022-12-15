@if (isset($produto_detalhe->id))
    <form action="{{ route('produto-detalhe.update', ['produto_detalhe' => $produto_detalhe]) }}" method="post">
        @csrf
        @method('PUT')
    @else
        <form action="{{ route('produto-detalhe.store') }}" method="post">
            @csrf
@endif
<input type="text" name="produto_id" value="{{ $produto_detalhe->produto_id ?? old('produto_id') }}"
    placeholder="Id do Produto" id="" class="borda-preta">
{{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}

<input type="text" name="comprimento" value="{{ $produto_detalhe->comprimento ?? old('comprimento') }}"
    placeholder="Comprimento" id="" class="borda-preta">
{{ $errors->has('comprimento') ? $errors->first('comprimento') : '' }}

<input type="text" name="largura" value="{{ $produto_detalhe->largura ?? old('largura') }}" placeholder="Largura"
    id="" class="borda-preta">
{{ $errors->has('largura') ? $errors->first('largura') : '' }}

<input type="text" name="altura" value="{{ $produto_detalhe->altura ?? old('altura') }}" placeholder="Altura"
    id="" class="borda-preta">
{{ $errors->has('altura') ? $errors->first('altura') : '' }}

<select name="unidade_id">
    <option value="">[Selecione]</option>
    @foreach ($unidades as $unidade)
        <option value="{{ $unidade->id }}"
            {{ ($produto_detalhe->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : '' }}>
            {{ $unidade->descricao }}</option>
    @endforeach
</select>
{{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}

<button type="submit" class="borda-preta">Cadastrar</button>
</form>
