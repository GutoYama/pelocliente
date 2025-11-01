<?php
    namespace App\Models;
    use Illuminate\Support\Facades\DB;

    final class Prato {
        public $cod_prato;
        public $descricao;
        public $valor;

        public function addPrato($descricao, $valor){
            DB::insert(
                'INSERT INTO prato (descricao, valor) VALUES (?, ?)',
                [$descricao, $valor]
            );

            return DB::getPdo()->lastInsertId();
        }
    
        public function updatePrato($cod_prato, $descricao, $valor){
            DB::update(
                'UPDATE prato SET descricao=?, valor=? WHERE cod_prato=?',
                [$descricao, $valor, $cod_prato]
            );
        }
    
        public function selectPrato($cod_prato){
            return DB::select(
                'SELECT * FROM prato WHERE cod_prato=?',
                [$cod_prato]
            );
        }

        public function listarPrato(){
            return DB::select(
                'SELECT * FROM prato'
            );
        }
    
        public function deletePrato($cod_prato){
            DB::delete(
                'DELETE FROM prato WHERE cod_prato=?',
                [$cod_prato]
            );
        }

        public function totalVendido(){
            DB::select(
                'select p.descricao, sum(ip.quantidade) as quantidade_vendida
                FROM prato p 
                INNER JOIN itens_pedido ip ON p.cod_prato = ip.cod_prato 
                GROUP BY p.cod_prato
                ORDER BY sum(ip.quantidade) DESC'
            );
        }
    
    }
?>