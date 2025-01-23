<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContaRequest;
use App\Models\Conta;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContaController extends Controller
{
    public function index(Request $request)
    {
        $contas = Conta::when($request->has('nome'), function($whenQuery) use ($request){
            $whenQuery->where('nome', 'like', '%' . $request->nome . '%');
        })
        ->orderByDesc('created_at')
        ->paginate(10)
        ->withQueryString();
        return view('contas.index', ['contas' => $contas, 'nome'=> $request->nome]);
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
            $conta = Conta::create([
                'nome'=> $request->nome,
                'valor'=> str_replace(',', '.', str_replace('.', '', $request->valor)),
                'vencimento' => $request->vencimento,
            ]);
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
                'valor'=> str_replace(',', '.', str_replace('.', '', $request->valor)),
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
