<?php

namespace App\Http\Controllers;

use App\Pessoa;
use Illuminate\Http\Request;

class PessoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pessoas = Pessoa::all()
            ->sortBy('nome')
            ->sortByDesc('tipo');

        return view('pessoa.index', compact('pessoas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pessoa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pessoa = Pessoa::create($request->all());
        return redirect('pessoa');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pessoa = Pessoa::find($id);
        return view('pessoa.edit', ['data' => $pessoa]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pessoa = Pessoa::find($id);
        $pessoa->fill($request->all());
        $pessoa->update();
        return redirect('pessoa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pessoa::destroy($id);
        return redirect('pessoa');
    }

    public function listarMedicos()
    {
        return Pessoa::all()
            ->where('tipo', 1)
            ->whereNull('deleted_at')
            ->sortBy('nome')
            ->sortByDesc('tipo');
    }

    public function inserirMedico(Request $request)
    {
        Pessoa::create($request->all());
    }

    public function mostrarMedico($id)
    {
        return Pessoa::where('id', $id)
            ->where('tipo', 1)
            ->whereNull('deleted_at')
            ->first();
    }

    public function atualizarMedico(Request $request, $id)
    {
        $medico = Pessoa::where('id', $id)
            ->where('tipo', 1)
            ->whereNull('deleted_at')
            ->first();

        $medico->update($request->all());
    }

    public function deletarMedico($id)
    {
        $medico = Pessoa::where('id', $id)
            ->where('tipo', 1)
            ->whereNull('deleted_at')
            ->first();

        $medico->delete();
    }
}
