@extends('html')
@section('conteudo')

<body>

    <a href="{{ route('conta.create') }}"> Cadastrar </a>
    <h2>Listar as contas</h2>

    <a href="{{ route('conta.show') }}"> Visualizar </a> <br>
    <a href="{{ route('conta.edit') }}"> Editar </a> <br>
    <a href="{{ route('conta.destroy') }}"> Deletar </a> <br>
</body>