<?php
    namespace App\Models;

    final class Compra{
        public $cod_compra;
        public $cod_ingrediente;
        public $cod_fornecedor;
        public $quantidade;

        public function addCompra($cod_ingrediente, $cod_fornecedor, $quantidade){
            DB::insert(
                'INSERT INTO compra (cod_ingrediente, cod_fornecedor, quantidade) VALUES (?, ?, ?)',
                [$cod_ingrediente, $cod_fornecedor, $quantidade]
            );
        }
    
        public function updateCompra($cod_compra, $cod_ingrediente, $cod_fornecedor, $quantidade){
            DB::update(
                'UPDATE compra SET cod_ingrediente=?, cod_fornecedor=?, quantidade=? WHERE cod_compra=?',
                [$cod_ingrediente, $cod_fornecedor, $quantidade, $cod_compra]
            );
        }
    
        public function getCompra($cod_compra){
            return DB::select(
                'SELECT * FROM compra WHERE cod_compra=?',
                [$cod_compra]
            );
        }
    
        public function selectCompra($cod_compra){
            return DB::select(
                'SELECT * FROM compra WHERE cod_compra=?',
                [$cod_compra]
            );
        }
    
        public function deleteCompra($cod_compra){
            DB::delete(
                'DELETE FROM compra WHERE cod_compra=?',
                [$cod_compra]
            );
        }
    
    }
?>