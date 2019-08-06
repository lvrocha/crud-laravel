<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aluno;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alunos = Aluno::all();
        #dd($alunos);
        return view('alunos.index', compact('alunos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alunos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'nome'=>'required',
            'end_cep'=>'required',
            'end_logradouro'=>'required',
            'end_cidade'=>'required',
            'end_estado'=>'required',
            'end_bairro'=>'required',
            'end_numero'=>'required'
        ]);
        $aluno = new Aluno([
            'nome' => $request->get('nome'),
            'situacao' => $request->get('situacao'),
            'end_cep' => $request->get('end_cep'),
            'end_logradouro' => $request->get('end_logradouro'),
            'end_cidade' => $request->get('end_cidade'),
            'end_estado' => $request->get('end_estado'),
            'end_bairro' => $request->get('end_bairro'),
            'end_numero' => $request->get('end_numero'),
            'end_complemento' => $request->get('end_complemento'),
            'foto' => $request->get('foto')
        ]);
        $aluno->save();
        return redirect('/alunos')->with('success', 'Aluno foi adicionado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $aluno = Aluno::find($id);
        return view('alunos.edit', compact('aluno'));
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
        $request->validate([
            'nome'=>'required',
            'end_cep'=>'required',
            'end_logradouro'=>'required',
            'end_cidade'=>'required',
            'end_estado'=>'required',
            'end_bairro'=>'required',
            'end_numero'=>'required'
        ]);

        $aluno = Aluno::find($id);
        $aluno->nome = $request->get('nome');
        $aluno->situacao = $request->get('situacao');
        $aluno->end_cep = $request->get('end_cep');
        $aluno->end_logradouro = $request->get('end_logradouro');
        $aluno->end_cidade = $request->get('end_cidade');
        $aluno->end_estado = $request->get('end_estado');
        $aluno->end_bairro = $request->get('end_bairro');
        $aluno->end_numero = $request->get('end_numero');
        $aluno->end_complemento = $request->get('end_complemento');
        $aluno->foto = $request->get('foto');
        $aluno->save();

        return redirect('/alunos')->with('success', 'Aluno atualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aluno = Aluno::find($id);
        $aluno->delete();

        return redirect('/alunos')->with('success', 'Aluno apagado com sucesso');
    }
}
