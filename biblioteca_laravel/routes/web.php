<?php

use Illuminate\Support\Facades\Route;
use App\Models\Produto;
use Illuminate\Http\Request;

// Página inicial
Route::get('/', function () {
    return view('inicio');
});

// Cadastrar produto
Route::post('/cadastrar-produto', function (Request $request) {
    Produto::create([
        'nome' => $request->nome,
        'valor' => $request->valor,
        'quantidade' => $request->quantidade
    ]);
    return view('produtoCadastrado');
});

// Listar produto pelo ID
Route::get('/listar-produtos', function () {
    $produtos = Produto::all();
    return view('listarProdutos', ['produtos' => $produtos]);
});

// Exibir formulário de edição
Route::get('/editar-produtos/{id}', function ($id) {
    $produto = Produto::find($id);

    if (!$produto) {
        abort(404, 'Produto não encontrado.');
    }

    return view('editarProdutos', ['produto' => $produto]);
});

// Salvar alterações no produto
Route::post('/editar-produtos/{id}', function (Request $request, $id) {
    $produto = Produto::find($id);

    if (!$produto) {
        abort(404, 'Produto não encontrado.');
    }

    $produto->update([
        'nome' => $request->nome,
        'valor' => $request->valor,
        'quantidade' => $request->quantidade
    ]);

    return redirect('/listar-produtos/'.$id)->with('success', 'Produto editado com sucesso!');
});

// Exclusão de produto
Route::get('/excluir-produtos/{id}', function ($id) {
    $produto = Produto::find($id);

    if (!$produto) {
        abort(404, 'Produto não encontrado.');
    }

    $produto->delete();

    return redirect('/')->with('success', 'Produto excluído com sucesso!');
});
