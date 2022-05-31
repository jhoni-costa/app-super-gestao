<form action='{{ route('site.contato') }}' method="POST">
    @csrf
    <input type="text" placeholder="Nome" class="borda-preta" name='nome'>
    <br>
    <input type="text" placeholder="Telefone" class="borda-preta" name='telefone'>
    <br>
    <input type="text" placeholder="E-mail" class="borda-preta" nome='email'>
    <br>
    <select class="borda-preta" name='motivo_contato'>
        <option value="">Qual o motivo do contato?</option>
        <option value="1">Dúvida</option>
        <option value="2">Elogio</option>
        <option value="3">Reclamação</option>
    </select>
    <br>
    <textarea class="borda-preta" name='mensagem' placeholder='Preencha aqui a sua mensagem'></textarea>
    <br>
    <button type="submit" class="borda-preta">ENVIAR</button>
</form>