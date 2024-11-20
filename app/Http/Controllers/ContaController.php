<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContaRequest;
use App\Models\Conta;
use Illuminate\Http\Request;

class ContaController extends Controller
{
    public function index()
    {
        return view('contas.index');
    }

    public function create()
    {
        return view('contas.create');
    }

    public function show()
    {
        return view('contas.show');
    }

    public function store(ContaRequest $request)
    {
        $request->validated();
        Conta::create($request->all());
        return redirect()->route('conta.show')->with('sucesso', 'Conta cadastrada com sucesso');
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
