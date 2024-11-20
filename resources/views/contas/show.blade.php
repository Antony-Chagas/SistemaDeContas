@extends('html')
@section('conteudo')

<body>
    <a href="{{ route('conta.index') }}">Lista de contas</a>

    <h2>Detalhe da conta</h2>

    @if(session('sucesso'))
        <span style="color: #082;">
       {{ session('sucesso') }}           
        </span>
    @endif
</body>