<?php

namespace App\Http\Controllers;

use App\Agendamento;
use App\Pessoa;
use Illuminate\Http\Request;

class AgendamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agendamentos = Agendamento::all()->sortBy('data_consulta');
        return view('agendamento.index', compact('agendamentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicos = Pessoa::where('tipo', 1)->orderBy('nome')->get();
        $pacientes = Pessoa::where('tipo', 0)->orderBy('nome')->get();

        return view('agendamento.create', compact('pacientes', 'medicos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $agendamento = Agendamento::create($request->all());
        return redirect('agendamento');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Agendamento::find($id);
        $medicos = Pessoa::where('tipo', 1)->orderBy('nome')->get();
        $pacientes = Pessoa::where('tipo', 0)->orderBy('nome')->get();

        return view('agendamento.edit', compact('data', 'pacientes', 'medicos'));
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
        $agendamento = Agendamento::find($id);
        $agendamento->fill($request->all());
        $agendamento->update();
        return redirect('agendamento');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Agendamento::destroy($id);
        return redirect('agendamento');
    }
}
