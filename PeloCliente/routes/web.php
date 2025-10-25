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