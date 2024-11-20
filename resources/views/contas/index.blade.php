@extends('html')
@section('conteudo')

    <body>

        <a href="{{ route('conta.create') }}">
            <button type="button">Cadastrar</button>
        </a>
        <h2>Listar as contas</h2>

        @if (session('error'))
            <span style="color: #ff0000;">
                {{ session('error') }}
            </span> <br><br>
        @endif

        @if (session('sucesso'))
            <span style="color: #082;">
                {{ session('sucesso') }}
            </span> <br><br>
        @endif

        @forelse ($contas as $conta)
            ID: {{ $conta->id }} <br>
            Nome: {{ $conta->nome }} <br>
            Valor: {{ 'R$ ' . number_format($conta->valor, 2, ',', '.') }} <br>
            Vencimento: {{ \Carbon\Carbon::parse($conta->vencimento)->tz('America/Sao_Paulo')->format('d/m/Y') }} <br>

            <a href="{{ route('conta.show', ['conta' => $conta->id]) }}">
                <button type="button">Visualizar</button>
            </a> <br>
            <a href="{{ route('conta.edit', ['conta' => $conta->id]) }}">
                <button type="button">Editar</button>
            </a>

            <form action="{{ route('conta.destroy', ['conta' => $conta->id]) }}}}" method="POST">
                @csrf
                @method('delete')
                <button type="submit"
                    onclick="return confirm('Tem certeza que deseja apagar esse registro?')">Apagar</button>
            </form>
            <hr>
        @empty
            <span style="color: #ff0000">Nenhuma conta encontrada</span>
        @endforelse

    </body>
