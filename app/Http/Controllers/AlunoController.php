<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Aluno;
use App\Endereco;
use App\Curso;
use App\Turma;
use App\Aluno_turma_curso;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alunos = Aluno::with('endereco','aluno_turma_cursos')->get();
        return view('alunos.index', compact('alunos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cursos = Curso::all();
        $turmas = Turma::all();
        return view('alunos.create', compact('cursos', 'turmas'));
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
            'cep'=>'required',
            'logradouro'=>'required',
            'cidade'=>'required',
            'estado'=>'required',
            'bairro'=>'required',
            'numero'=>'required',
            'curso_id'=>'required',
            'turma_id'=>'required',
            'data_matricula'=>'required'
        ]);
        $dados = [
            'nome'=>$request->get('nome'),
            'situacao'=>$request->get('situacao'),
            'foto'=>$request->get('foto'),
            'cep'=>$request->get('cep'),
            'logradouro'=>$request->get('logradouro'),
            'cidade'=>$request->get('cidade'),
            'estado'=>$request->get('estado'),
            'bairro'=>$request->get('bairro'),
            'numero'=>$request->get('numero'),
            'complemento'=>$request->get('complemento'),
            'curso_id'=>$request->get('curso_id'),
            'turma_id'=>$request->get('turma_id'),
            'data_matricula'=>$request->get('data_matricula')
        ];

        dd($dados);

        $aluno = Aluno::create($dados);

        // $endereco = new Endereco;
        // $endereco->cep = $dados['cep'];
        // $endereco->logradouro = $dados['logradouro'];
        // $endereco->cidade = $dados['cidade'];
        // $endereco->estado = $dados['estado'];
        // $endereco->bairro = $dados['bairro'];
        // $endereco->numero = $dados['numero'];
        // $endereco->complemento = $dados['complemento'];
        // $endereco->aluno_id = $aluno->id;
        // $endereco->save();

        $endereco = $aluno->endereco()->create($dados);

        $aluno_turma_curso = $aluno->aluno_turma_cursos();

        dd($aluno_turma_curso);

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

        $aluno = Aluno::with('endereco','aluno_turma_cursos')->find($id);
        #dd($aluno);
        #$aluno = $aluno['0'];
        $cursos = Curso::all();
        $turmas = Turma::all();
        return view('alunos.edit', compact('aluno','cursos','turmas'));
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
            'cep'=>'required',
            'logradouro'=>'required',
            'cidade'=>'required',
            'estado'=>'required',
            'bairro'=>'required',
            'numero'=>'required'
        ]);

        $aluno = DB::table('alunos')
                ->join('enderecos', 'alunos.id', '=', 'enderecos.aluno_id')
                ->where('alunos.id', '=', $id)
                ->get();
        $aluno = $aluno['0'];
        $aluno->nome = $request->get('nome');
        $aluno->situacao = $request->get('situacao');
        $aluno->cep = $request->get('cep');
        $aluno->logradouro = $request->get('logradouro');
        $aluno->cidade = $request->get('cidade');
        $aluno->estado = $request->get('estado');
        $aluno->bairro = $request->get('bairro');
        $aluno->numero = $request->get('numero');
        $aluno->complemento = $request->get('complemento');
        $aluno->foto = $request->get('foto');
        DB::table('alunos')
            ->where('id', $aluno->id)
            ->update([
                'nome' => $aluno->nome,
                'situacao' => $aluno->situacao,
                'foto' => $aluno->foto
                ]);
        DB::table('enderecos')
                ->where('id', $aluno->id)
                ->update([
                    'cep' => $aluno->cep,
                    'logradouro' => $aluno->logradouro,
                    'cidade' => $aluno->cidade,
                    'estado' => $aluno->estado,
                    'bairro' => $aluno->bairro,
                    'numero' => $aluno->numero,
                    'complemento' => $aluno->complemento
                    ]);

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
