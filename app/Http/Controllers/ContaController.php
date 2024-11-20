<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContaRequest;
use App\Models\Conta;
use Illuminate\Http\Request;

class ContaController extends Controller
{
    public function index()
    {
        $contas = Conta::orderByDesc('created_at')->get();
        return view('contas.index', ['contas' => $contas]);
    }

    public function create()
    {
        return view('contas.create');
    }

    public function show(Conta $conta)
    {
        return view('contas.show', ['conta' => $conta]);
    }

    public function store(ContaRequest $request)
    {
        $request->validated();
        $conta = Conta::create($request->all());
        return redirect()->route('conta.show', ['conta' => $conta->id])->with('sucesso', 'Conta cadastrada com sucesso!');
    }

    public function edit(Conta $conta)
    {

        return view('contas.edit', ['conta' => $conta]);
    }

    public function update(ContaRequest $request, Conta $conta)
    {
        $request->validated();
        $conta->update([
            'nome' => $request->nome,
            'valor' => $request->valor,
            'vencimento' => $request->vencimento,
        ]);
        return redirect()->route('conta.show', ['conta' => $conta->id])->with('sucesso', 'Conta editada com sucesso!');
    }

    public function destroy(Conta $conta)
    {
        $conta->delete();
        return redirect()->route('conta.index')->with('sucesso', 'Conta apagada com sucesso!');
    }
}
