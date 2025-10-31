<?php
    namespace App\Models;
    use Illuminate\Support\Facades\DB;

    final class Itens_pedido {
        public $cod_prato;
        public $cod_pedido;
        public $quantidade;


        public function addItens_pedido($cod_prato, $cod_pedido, $quantidade){
            DB::insert(
                'INSERT INTO itens_pedido (cod_prato, cod_pedido, quantidade) VALUES (?, ?, ?)',
                [$cod_prato, $cod_pedido, $quantidade]
            );
        }
    
        public function updateItens_pedido($cod_prato, $cod_pedido, $quantidade){
            DB::update(
                'UPDATE itens_pedido SET quantidade=? WHERE cod_prato=? AND cod_pedido=?',
                [$quantidade, $cod_prato, $cod_pedido]
            );
        }
    
        public function selectItens_pedido($cod_prato, $cod_pedido){
            return DB::select(
                'SELECT * FROM itens_pedido WHERE cod_prato=? AND cod_pedido=?',
                [$cod_prato, $cod_pedido]
            );
        }

        public function listarItens_pedidoPorPedido($cod_pedido){
            return DB::select(
                'SELECT i.cod_prato, p.descricao, i.cod_pedido, i.quantidade FROM itens_pedido i
                INNER JOIN prato p
                ON i.cod_prato = p.cod_prato
                WHERE cod_pedido=?', 
                [$cod_pedido]
            );
        }
    
        public function deleteItens_pedido($cod_prato, $cod_pedido){
            DB::delete(
                'DELETE FROM itens_pedido WHERE cod_prato=? AND cod_pedido=?',
                [$cod_prato, $cod_pedido]
            );
        }

        public function deleteItens_pedidoPorPedido($cod_pedido){
            DB::delete(
                'DELETE FROM itens_pedido WHERE cod_pedido=?',
                [$cod_pedido]
            );
        }
    
    }
?>