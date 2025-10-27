<?php
    namespace App\Models;
    use Illuminate\Support\Facades\DB;

    final class Ingrediente {
        public $cod_ingrediente;
        public $descricao;
        public $quantidade;
        public $cod_unidade;
        public $valor_unit;

        public function addIngrediente($descricao, $quantidade, $cod_unidade, $valor_unit){
            DB::insert(
                'INSERT INTO ingrediente (descricao, quantidade, cod_unidade, valor_unit) VALUES (?, ?, ?, ?)',
                [$descricao, $quantidade, $cod_unidade, $valor_unit]
            );
        }
    
        public function updateIngrediente($cod_ingrediente, $descricao, $quantidade, $cod_unidade, $valor_unit){
            DB::update(
                'UPDATE ingrediente SET descricao=?, quantidade=?, cod_unidade=?, valor_unit=? WHERE cod_ingrediente=?',
                [$descricao, $quantidade, $cod_unidade, $valor_unit, $cod_ingrediente]
            );
        }
    
        public function selectIngrediente($cod_ingrediente){
            return DB::select(
                'SELECT i.cod_ingrediente, i.descricao, i.quantidade, i.cod_unidade, u.sigla, i.valor_unit FROM ingrediente i 
                INNER JOIN unidade u
                ON i.cod_unidade = u.cod_unidade
                WHERE cod_ingrediente=?',
                [$cod_ingrediente]
            );
        }

        public function listarIngrediente(){
            return DB::select(
                'SELECT i.cod_ingrediente, i.descricao, i.quantidade, i.cod_unidade, u.sigla, i.valor_unit FROM ingrediente i
                INNER JOIN unidade u
                ON i.cod_unidade = u.cod_unidade'
            );
        }
    
        public function deleteIngrediente($cod_ingrediente){
            DB::delete(
                'DELETE FROM ingrediente WHERE cod_ingrediente=?',
                [$cod_ingrediente]
            );
        }
    
    }
?>
