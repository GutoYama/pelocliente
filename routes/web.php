<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Models\Cliente;
use App\Models\Fornecedor;
use App\Models\Prato;
use App\Models\Ingrediente;
use App\Models\Composicao;
use App\Models\Compra;
use App\Models\Unidade;

Route::get('/', function () {
    return view('menu');
});


// ====================================================================================

// FORNECEDORES
Route::get('/fornecedor', function(){
    $fornecedor = new Fornecedor;
    
    return view ('fornecedor', ['fornecedores'=>$fornecedor->listarFornecedor()]);
})->name('fornecedor');


Route::get('/fornecedor/adicionar', function(){
    return view ('adicionarfornecedor');
});

Route::post('/fornecedor/adicionar_bd', function(Request $request){
    $fornecedor = new Fornecedor;

    $fornecedor->addFornecedor(
        $request->input('nome_fantasia'),
        $request->input('endereco'),
        $request->input('cnpj'),
        $request->input('telefone')
    );
    
    return redirect()->route('fornecedor');
});


Route::get('/fornecedorEditar', function(){
    return view('welcome');
})->name('fornecedorEditar');

Route::get('/fornecedorExcluir', function(){
    return view('welcome');
})->name('fornecedorExcluir');


// ====================================================================================

// CLIENTES
Route::get('/cliente', function(){
    $cliente = new Cliente;
    
    return view ('cliente', ['clientes'=>$cliente->listarCliente()]);
})->name('cliente');


Route::get('/cliente/adicionar', function() {
    return view('adicionarcliente');
});

Route::post('/cliente/adicionar_bd', function(Request $request) {
    $cliente = new Cliente;

    $cliente->addCliente(
        $request->input('nome'),
        $request->input('cpf'),
        $request->input('endereco'),
        $request->input('telefone'),
        $request->input('email')
    );

    return redirect()->route('cliente');
});



Route::get('/clienteEditar', function(){
    return view('welcome');
})->name('clienteEditar');

Route::get('/clienteExcluir', function(){
    return view('welcome');
})->name('clienteExcluir');


// ====================================================================================

// PRATOS
Route::get('/prato', function(){
    $prato = new Prato;
    
    return view ('prato', ['pratos'=>$prato->listarPrato()]);
})->name('prato');


Route::get('/prato/adicionar', function() {
    return view('adicionarprato');
});

Route::post('/prato/adicionar_bd', function(Request $request) {
    $prato = new Prato;

    $prato->addPrato(
        $request->input('descricao'),
        $request->input('valor')
    );

    return redirect()->route('prato');
});



Route::get('/pratoEditar', function(){
    return view('welcome');
})->name('pratoEditar');

Route::get('/pratoExcluir', function(){
    return view('welcome');
})->name('pratoExcluir');


// ====================================================================================

// INGREDIENTES
Route::get('/ingrediente', function(){
    $ingrediente = new Ingrediente;
    
    return view ('ingrediente', ['ingredientes'=>$ingrediente->listarIngrediente()]);
});

Route::get('/ingredienteEditar', function(){
    return view('welcome');
})->name('ingredienteEditar');

Route::get('/ingredienteExcluir', function(){
    return view('welcome');
})->name('ingredienteExcluir');


// ====================================================================================

// COMPOSICOES
Route::get('/composicao', function(){
    $composicao = new Composicao;
    
    return view ('composicao', ['composicoes'=>$composicao->listarComposicao()]);
});

Route::get('/composicaoEditar', function(){
    return view('welcome');
})->name('composicaoEditar');

Route::get('/composicaoExcluir', function(){
    return view('welcome');
})->name('composicaoExcluir');


// ====================================================================================

// COMPRAS
Route::get('/compra', function(){
    $compra = new Compra;
    
    return view ('compra', ['compras'=>$compra->listarCompra()]);
});

Route::get('/compraEditar', function(){
    return view('welcome');
})->name('compraEditar');

Route::get('/compraExcluir', function(){
    return view('welcome');
})->name('compraExcluir');


// ====================================================================================

// UNIDADES
Route::get('/unidade', function(){
    $unidade = new Unidade;
    
    return view ('unidade', ['unidades'=>$unidade->listarUnidade()]);
})->name('unidade');


Route::get('/unidade/adicionar', function() {
    return view('adicionarunidade');
});

Route::post('/unidade/adicionar_bd', function(Request $request) {
    $unidade = new Unidade;

    $unidade->addUnidade(
        $request->input('descricao'),
        $request->input('sigla')
    );

    return redirect()->route('unidade');
});



Route::get('/unidadeEditar', function(){
    return view('welcome');
})->name('unidadeEditar');

Route::get('/unidadeExcluir', function(){
    return view('welcome');
})->name('unidadeExcluir');