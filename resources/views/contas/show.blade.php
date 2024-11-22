@extends('layouts.admin')
@section('content')

    <body>
        <a href="{{ route('conta.index') }}">
            <button type="button">Lista de contas</button>
        </a> <br>

        <h2>Detalhe da conta</h2>

        @if (session('sucesso'))
            <span style="color: #082;">
                {{ session('sucesso') }}
            </span> <br><br>
        @endif

        ID: {{ $conta->id }} <br>
        Nome: {{ $conta->nome }} <br>
        Valor: {{ 'R$ ' . number_format($conta->valor, 2, ',', '.') }} <br>
        Vencimento: {{ \Carbon\Carbon::parse($conta->vencimento)->tz('America/Sao_Paulo')->format('d/m/Y') }} <br>
        Criado: {{ \Carbon\Carbon::parse($conta->created_at)->tz('America/Sao_Paulo')->format('d/m/Y - H:i:s') }} <br>
        Editado: {{ \Carbon\Carbon::parse($conta->updated_at)->tz('America/Sao_Paulo')->format('d/m/Y - H:i:s') }} <br>
        <br>
        <a href="{{ route('conta.edit', ['conta' => $conta->id]) }}">
            <button type="button">Editar</button>
        </a>
    </body>
@endsection
