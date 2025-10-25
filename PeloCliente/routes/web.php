<?php

use Illuminate\Support\Facades\Route;
use App\Models\Cliente;
use App\Models\Fornecedor;

Route::get('/', function () {
    return view('welcome');
});


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