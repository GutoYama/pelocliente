<?php
    namespace App\Models;

    final class Pedido {
        public $cod_pedido;
        public $cod_cliente;
        public $valor_total;
        public $endereco;
        public $datahora;

        public function addPedido($cod_cliente, $valor_total, $endereco, $datahora){
            DB::insert(
                'INSERT INTO pedido (cod_cliente, valor_total, endereco, datahora) VALUES (?, ?, ?, ?)',
                [$cod_cliente, $valor_total, $endereco, $datahora]
            );
        }
    
        public function updatePedido($cod_pedido, $cod_cliente, $valor_total, $endereco, $datahora){
            DB::update(
                'UPDATE pedido SET cod_cliente=?, valor_total=?, endereco=?, datahora=? WHERE cod_pedido=?',
                [$cod_cliente, $valor_total, $endereco, $datahora, $cod_pedido]
            );
        }
    
        public function selectPedido($cod_pedido){
            return DB::select(
                'SELECT * FROM pedido WHERE cod_pedido=?',
                [$cod_pedido]
            );
        }
    
        public function deletePedido($cod_pedido){
            DB::delete(
                'DELETE FROM pedido WHERE cod_pedido=?',
                [$cod_pedido]
            );
        }
    
    }
?>