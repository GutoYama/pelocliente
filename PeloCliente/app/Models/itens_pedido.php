<?php
    namespace App\Models;

    final class Itens_pedidos {
        public $cod_prato;
        public $cod_pedido;
        public $quantidade;


        public function addItens_pedido($cod_prato, $cod_pedido, $quantidade){
            DB::insert(
                'INSERT INTO itens_pedidos (cod_prato, cod_pedido, quantidade) VALUES (?, ?, ?)',
                [$cod_prato, $cod_pedido, $quantidade]
            );
        }
    
        public function updateItens_pedido($cod_prato, $cod_pedido, $quantidade){
            DB::update(
                'UPDATE itens_pedidos SET quantidade=? WHERE cod_prato=? AND cod_pedido=?',
                [$quantidade, $cod_prato, $cod_pedido]
            );
        }
    
        public function selectItens_pedido($cod_prato, $cod_pedido){
            return DB::select(
                'SELECT * FROM itens_pedidos WHERE cod_prato=? AND cod_pedido=?',
                [$cod_prato, $cod_pedido]
            );
        }
    
        public function deleteItens_pedido($cod_prato, $cod_pedido){
            DB::delete(
                'DELETE FROM itens_pedidos WHERE cod_prato=? AND cod_pedido=?',
                [$cod_prato, $cod_pedido]
            );
        }
    
    }
?>