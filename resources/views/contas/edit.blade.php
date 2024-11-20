@extends('html')
@section('conteudo')

<body>
    <a href="{{ route('conta.index') }}">Lista de contas</a> <br>
    <a href="{{ route('conta.show', ['conta' => $conta->id]) }}"> Visualizar </a>
    <h2>Editar conta</h2>

    @if($errors->any())
        <span style="color: #ff0000;">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </span>
        <br>
    @endif

    <form action="{{ route('conta.update', ['conta'=>$conta->id])}}" method="POST">
        @csrf
        @method('PUT')

        <label>Nome: </label>
        <input type="text" name="nome" id="nome" placeholder="Nome da conta" value="{{ old('nome', $conta->nome)}}"> <br><br>

        <label>Valor: </label>
        <input type="text" name="valor" id="valor" placeholder="Valor da conta" value="{{ old('valor', $conta->valor)}}"> <br><br>

        <label>Vencimento: </label>
        <input type="date" name="vencimento" id="vencimento" value="{{ old('vencimento', $conta->vencimento)}}"> <br><br>

        <button type="submit">Editar</button>
    </form>

</body>
