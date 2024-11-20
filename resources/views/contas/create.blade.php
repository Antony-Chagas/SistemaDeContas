@extends('html')
@section('conteudo')

<body>
    <a href="{{ route('conta.index') }}">Lista de contas</a>
    <h2>Cadastar as contas</h2>

    @if($errors->any())
        <span style="color: #ff0000;">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </span>
        <br>
    @endif

    <form action="{{ route('conta.store')}}" method="POST">
        @csrf
        <label>Nome: </label>
        <input type="text" name="nome" id="nome" placeholder="Nome da conta" value="{{ old('nome')}}"> <br><br>

        <label>Valor: </label>
        <input type="text" name="valor" id="valor" placeholder="Valor da conta" value="{{ old('valor')}}"> <br><br>

        <label>Vencimento: </label>
        <input type="date" name="vencimento" id="vencimento" value="{{ old('vencimento')}}"> <br><br>

        <button type="submit">Cadastrar</button>
    </form>
</body>
