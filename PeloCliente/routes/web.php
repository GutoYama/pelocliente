<?php

use Illuminate\Support\Facades\Route;
use App\Models\Cliente;
use App\Models\Fornecedor;
use App\Models\Prato;

Route::get('/', function () {
    return view('welcome');
});



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
