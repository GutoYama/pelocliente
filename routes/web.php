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



Route::get('/clienteEditar', function(Request $request){
    $cliente = new Cliente;
    $cod_cliente = (int)$request->query('id');

    return view('editarcliente', ['cliente'=>$cliente->selectCliente($cod_cliente)]);
})->name('clienteEditar');

Route::get('/clienteEditar_bd', function (Request $request){
    $cliente = new Cliente;
    
    $cliente->updateCliente(
        $request->query('cod_cliente'), 
        $request->query('nome'),
        $request->query('cpf'),
        $request->query('endereco'),
        $request->query('telefone'),
        $request->query('email')
    );

    return redirect()->route('cliente');
});

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
})->name('ingrediente');



Route::get('/ingrediente/adicionar', function() {
    $unidade = new Unidade;
    
    return view('adicionaringrediente', ['unidades'=>$unidade->listarUnidade()]);
});

Route::post('/ingrediente/adicionar_bd', function(Request $request) {
    $ingrediente = new Ingrediente;

    $ingrediente->addIngrediente(
        $request->input('descricao'),
        $request->input('quantidade'),
        $request->input('unidade'),
        $request->input('valor_unit')
    );

    return redirect()->route('ingrediente');
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
    
    $composicoes = $composicao->listarComposicao();
    $composicoes_separadas = [];

    for ($i = 0; $i < count($composicoes); $i++)
    {      
        $composicao_unica = [];

        while ($composicoes[$i]->cod_prato == $composicoes[$i+1]->cod_prato)
        {
            $composicao_unica[] = $composicoes[$i];
            $i++;

            if ($i+1 == count($composicoes))
                break;
        }

        $composicao_unica[] = $composicoes[$i];
        
        $composicoes_separadas[] = $composicao_unica;
    }

    return view ('composicao', ['composicoes'=>$composicoes_separadas]);
})->name('composicao');


Route::get('/composicao/adicionar', function(){
    $prato = new Prato;
    $ingrediente = new Ingrediente;

    return view('adicionarcomposicao', ['pratos'=>$prato->listarPrato(), 'ingredientes'=>$ingrediente->listarIngrediente()]); 
});

Route::post('/composicao/adicionar_bd', function(Request $request){
    
    $totalDeIngredientes = $request->input('totaldeingredientes');
    $cod_prato = $request->input('prato');

    $composicao = new Composicao;

    for ($i = 1; $i <= $totalDeIngredientes; $i++)
    {
        $cod_ingrediente = $request->input('ingrediente' . $i);
        $quantidade = $request->input('quantidadeingrediente' . $i);
        
        $composicao->addComposicao($cod_prato, $cod_ingrediente, $quantidade);
    }

    
    return redirect()->route('composicao');
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
})->name('compra');



Route::get('/compra/adicionar', function() {
    $ingrediente = new Ingrediente;
    $fornecedor = new Fornecedor;
    
    return view('adicionarcompra', ['ingredientes'=>$ingrediente->listarIngrediente(), 'fornecedores'=>$fornecedor->listarFornecedor()]);
});

Route::post('/compra/adicionar_bd', function(Request $request) {
    $compra = new Compra;

    $compra->addCompra(
        $request->input('ingrediente'),
        $request->input('fornecedor'),
        $request->input('quantidade')
    );

    return redirect()->route('compra');
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