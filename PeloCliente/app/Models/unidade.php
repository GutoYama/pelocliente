<?php
    namespace App\Models;

    final class Unidade {
        public $cod_unidade;
        public $descricao;
        public $sigla;

        public function addUnidade($descricao, $sigla){
            DB::insert(
                'INSERT INTO unidade (descricao, sigla) VALUES (?, ?)',
                [$descricao, $sigla]
            );
        }
    
        public function updateUnidade($cod_unidade, $descricao, $sigla){
            DB::update(
                'UPDATE unidade SET descricao=?, sigla=? WHERE cod_unidade=?',
                [$descricao, $sigla, $cod_unidade]
            );
        }
    
        public function selectUnidade($cod_unidade){
            return DB::select(
                'SELECT * FROM unidade WHERE cod_unidade=?',
                [$cod_unidade]
            );
        }
    
        public function deleteUnidade($cod_unidade){
            DB::delete(
                'DELETE FROM unidade WHERE cod_unidade=?',
                [$cod_unidade]
            );
        }
    
    }
?>