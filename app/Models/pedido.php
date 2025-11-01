<?php
    namespace App\Models;
    use Illuminate\Support\Facades\DB;

    final class Pedido {
        public $cod_pedido;
        public $cod_cliente;
        public $valor_total;
        public $endereco;
        public $datahora;
        public $entregue;

        public function addPedido($cod_cliente, $valor_total, $endereco, $datahora){
            DB::insert(
                'INSERT INTO pedido (cod_cliente, valor_total, endereco, datahora, entregue) VALUES (?, ?, ?, ?, false)',
                [$cod_cliente, $valor_total, $endereco, $datahora]
            );

            return DB::getPdo()->lastInsertId();
        }
    
        public function updatePedido($cod_pedido, $cod_cliente, $valor_total, $endereco, $datahora){
            DB::update(
                'UPDATE pedido SET cod_cliente=?, valor_total=?, endereco=?, datahora=? WHERE cod_pedido=?',
                [$cod_cliente, $valor_total, $endereco, $datahora, $cod_pedido]
            );
        }

        public function listarPedido(){
            return DB::select(
                'SELECT p.cod_pedido, c.cod_cliente, c.nome, p.valor_total, p.endereco, p.datahora, p.entregue FROM pedido p
                LEFT OUTER JOIN cliente c
                ON p.cod_cliente = c.cod_cliente
                ORDER BY p.datahora DESC'
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

        public function setEntregue($cod_pedido){
            DB::update(
                'UPDATE pedido SET entregue=true WHERE cod_pedido=?',[$cod_pedido]
            );
        }

        public function selectValorTotalVendido($data){
            return DB::select(
                'select total_vendido_mes(?) as total',
                [$data]
            );
        }
    
    }
?>