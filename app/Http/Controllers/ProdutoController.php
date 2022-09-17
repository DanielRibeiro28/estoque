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
        $produto = Produto::find(4);
        $produto->nome       = 'Shampoo Clear Men';
        $produto->quantidade =20;
        $produto->valor      = 200;
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
        $produtos = Produto::find($id);
        $produtos-> delete();
        //dd('Destroy');
    }
}
