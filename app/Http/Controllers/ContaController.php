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
        return redirect()->route('conta.show', ['conta' => $conta->id])->with('sucesso', 'Conta cadastrada com sucesso');
    }

    public function edit()
    {
        return view('contas.edit');
    }

    public function update()
    {
        dd("Editar");
    }

    public function destroy()
    {
        dd("Delete");
    }
}
