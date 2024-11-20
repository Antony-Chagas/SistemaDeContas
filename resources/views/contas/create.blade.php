@extends('html')
@section('conteudo')

<body>
    <a href="{{ route('conta.index') }}">Lista de contas</a>
    <h2>Cadastar as contas</h2>
    

    <form action="{{ route('conta.store')}}" method="POST">
        @csrf

        <label>Nome: </label>
        <input type="text" name="nome" id="nome" placeholder="Nome da conta" required> <br><br>

        <label>Valor: </label>
        <input type="text" name="valor" id="valor" placeholder="Valor da conta" required> <br><br>

        <label>Vencimento: </label>
        <input type="date" name="vencimento" id="vencimento" required> <br><br>

        <button type="submit">Cadastrar</button>
    </form>
</body>