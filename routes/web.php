<?php

use Illuminate\Support\Facades\Route;
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
});

Route::get('/unidadeEditar', function(){
    return view('welcome');
})->name('unidadeEditar');

Route::get('/unidadeExcluir', function(){
    return view('welcome');
})->name('unidadeExcluir');