<?php
    namespace App\Models;

    final class Composicao{
        public $cod_prato;
        public $cod_ingrediente;
        public $quantidade;

        public function addComposicao($cod_prato, $cod_ingrediente, $quantidade){
            DB::insert(
                'INSERT INTO composicao (cod_prato, cod_ingrediente, quantidade) VALUES (?, ?, ?)',
                [$cod_prato, $cod_ingrediente, $quantidade]
            );
        }
    
        public function updateComposicao($cod_prato, $cod_ingrediente, $quantidade){
            DB::update(
                'UPDATE composicao SET quantidade=? WHERE cod_prato=? AND cod_ingrediente=?',
                [$quantidade, $cod_prato, $cod_ingrediente]
            );
        }
    
        public function selectComposicao($cod_prato, $cod_ingrediente){
            return DB::select(
                'SELECT * FROM composicao WHERE cod_prato=? AND cod_ingrediente=?',
                [$cod_prato, $cod_ingrediente]
            );
        }
    
        public function deleteComposicao($cod_prato, $cod_ingrediente){
            DB::delete(
                'DELETE FROM composicao WHERE cod_prato=? AND cod_ingrediente=?',
                [$cod_prato, $cod_ingrediente]
            );
        }
    
    }
?>