@extends('html')
@section('conteudo')

<body>

    <a href="{{ route('conta.create') }}"> Cadastrar </a>
    <h2>Listar as contas</h2>

    {{--<a href="{{ route('conta.show') }}"> Visualizar </a> <br>
    <a href="{{ route('conta.edit') }}"> Editar </a> <br>
    <a href="{{ route('conta.destroy') }}"> Deletar </a> <br>--}}

    @forelse ($contas as $conta)
        ID: {{ $conta->id}} <br>
        Nome: {{ $conta->nome}} <br>
        Valor: {{ 'R$ ' . number_format($conta->valor, 2, ',', '.')}} <br>
        Vencimento: {{ \Carbon\Carbon::parse($conta->vencimento)->tz('America/Sao_Paulo')->format('d/m/Y')}} <br>

        <a href="{{ route('conta.show', ['conta' => $conta->id]) }}"> Visualizar </a> <br>
        <a href="{{ route('conta.edit', ['conta' => $conta->id]) }}"> Editar </a>

        <hr>
    @empty
        <span style="color: #ff0000">Nenhuma conta encontrada</span>
    @endforelse

</body>
