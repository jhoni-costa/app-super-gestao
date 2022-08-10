{{ $slot }}

<form action='{{ route('site.contato') }}' method="POST">
    @csrf
    <input type="text" placeholder="Nome" value='{{ old('nome') }}' class="{{ $classe }}" name='nome'>
    <br>
    <input type="text" placeholder="Telefone" class="{{ $classe }}" value='{{ old('telefone') }}' name='telefone'>
    <br>
    <input type="text" placeholder="E-mail" class="{{ $classe }}" value='{{ old('email') }}' name='email'>
    <br>
    <select class="{{ $classe }}" name='motivo_contatos_id'>
        <option value="">Qual o motivo do contato?</option>
        @foreach ( $motivo_contatos as $key => $value )
            <option value="{{ $value->id }}" {{ $value->id == old('motivo_contatos_id') ? 'selected' : ""}}>{{ $value->motivo_contato }}</option>
        @endforeach
    </select>
    <br>
    <textarea class="{{ $classe }}" name='mensagem' placeholder='Preencha aqui a sua mensagem'>{{ old('mensagem') }}</textarea>
    <br>
    <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>
<div style='position:absolute; top:0px; left:0px; width:100%; background:red'>
    <pre>
    {{ print_r($errors); }}
    </pre>
</div>