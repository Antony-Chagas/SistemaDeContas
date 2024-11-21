<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContaRequest;
use App\Models\Conta;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        try {
            $conta = Conta::create($request->all());
            Log::info('Conta criada com sucesso.', ['id' => $conta->id, 'conta' => $conta]);
            return redirect()->route('conta.show', ['conta' => $conta->id])->with('sucesso', 'Conta cadastrada com sucesso!');
        } catch (Exception $e) {
            Log::warning('Erro ao criar conta.', ['error' => $e->getMessage()]);
            return back()->with('error', 'Conta não cadastrada!');
        }
    }

    public function edit(Conta $conta)
    {
        return view('contas.edit', ['conta' => $conta]);
    }

    public function update(ContaRequest $request, Conta $conta)
    {
        $request->validated();
        try {
            $conta->update([
                'nome' => $request->nome,
                'valor' => $request->valor,
                'vencimento' => $request->vencimento,
            ]);
            Log::info('Conta editada com sucesso.', ['id' => $conta->id, 'conta' => $conta]);
            return redirect()->route('conta.show', ['conta' => $conta->id])->with('sucesso', 'Conta editada com sucesso!');
        } catch (Exception $e) {
            Log::warning('Conta não editada.', ['error' => $e->getMessage()]);
            return back()->withInput()->with('error', 'Conta não editada!');
        }
    }

    public function destroy(Conta $conta)
    {
        try {
            $conta->delete();
            Log::info('Conta deletada com sucesso.', ['id' => $conta->id, 'conta' => $conta]);
            return redirect()->route('conta.index')->with('sucesso', 'Conta apagada com sucesso!');
        } catch (Exception $e) {
            Log::warning('Conta não deletada.', ['error' => $e->getMessage()]);
            return back()->with('error', 'Conta não apagada!');
        }
    }
}
