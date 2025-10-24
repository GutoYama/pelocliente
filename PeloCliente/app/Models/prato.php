<?php
    namespace App\Models;

    final class Prato {
        public $cod_prato;
        public $descricao;
        public $valor;

        public function addPrato($descricao, $valor){
            DB::insert(
                'INSERT INTO prato (descricao, valor) VALUES (?, ?)',
                [$descricao, $valor]
            );
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
    
        public function deletePrato($cod_prato){
            DB::delete(
                'DELETE FROM prato WHERE cod_prato=?',
                [$cod_prato]
            );
        }
    
    }
?>