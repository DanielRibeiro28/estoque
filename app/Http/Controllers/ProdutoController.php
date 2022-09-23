<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //listar os produtos

        $produtos = Produto::orderBy('nome','ASC')->get();
        return view('produto.produto_index', ['produtos'=> $produtos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('produto.produto_create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //dd($request->all());

        $messages = [
            'nome.required' => 'O campo :atribute é obrigatório!',
            'nome.min' => 'O campo :atribute precisa ter no mínimo :min.',
            'quantidade.required' => 'O :atribute é obrigatório!',
            'quantidade.integer' => 'O :atribute é obrigatório!'
        ];

        $validated = $request->validate([
            'nome'       => 'required|min:8',
            'quantidade' => 'required|integer',
            'valor'      => 'required',
        ], $messages);

        $produto = new Produto;
        $produto->nome         = $request->nome;
        $produto->quantidade   = $request->quantidade;
        $produto->valor        = $request->valor;
        $produto->save();

     return redirect('/produto')->with('status', 'Produto criado com sucesso!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
     public function show($id)
    {
        //dd('Entrou no Show');
        $produto = Produto::find($id);
        //dd($produtos);
        return view('produto.produto_show', ['produto'=> $produto]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $produto = Produto::find($id);
       return view('produto.produto_edit', ['produto'=> $produto]);
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
        //dd('UPDATE');
        $produto = Produto::find($id);
        $produto->nome       =      $request->nome;
        $produto->quantidade =      $request->quantidade;
        $produto->valor      =      $request->valor;
        $produto->save();
        
        //dd($produto);

        return redirect('/produto')->with('status', 'Produto atualizado com sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd('Destroy');
        $produto = Produto::find($id);
        $produto-> delete();

        return redirect('/produto')->with('status', 'Produto excluido com sucesso!');
        
    }
}
