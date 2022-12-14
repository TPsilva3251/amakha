<?php

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Produto;
use App\Models\Cliente;
class ProdutoController extends Controller
{
    private $produto;
    private $cliente;

    public function __construct(Produto $produto, Cliente $cliente)
    {
        $this->produto = $produto;
        $this->cliente = $cliente;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $produtos = $this->produto->all();

        return view('painel.produto.lista_produtos', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('painel.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $dataForm = $request->all();

       $create = $this->produto->create($dataForm);

       if($create) {
        session()->flash('success', 'Cadastro realizado com sucesso .');
        return back();

       } else {
        session()->flash('error', 'Erro ao tentar cadastrar !');
        return redirect('produto/lista');
       }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function listaProdutos($id)
    {
        $produtos = $this->produto->all();
        // dd($id);
        $cliente = $this->cliente->find($id);
        // dd($clientes);

        return view('painel.produto.index', compact('produtos','cliente'));
    }

    public function listaProduto()
    {
        $produtos = $this->produto->all();

        return view('painel.produto.index', compact('produtos'));
    }
}
