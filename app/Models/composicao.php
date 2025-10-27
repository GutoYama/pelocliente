<?php
    namespace App\Models;
    use Illuminate\Support\Facades\DB;

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

        public function listarComposicao(){
            return DB::select(
                'SELECT c.cod_prato, p.descricao AS descricao_prato, c.cod_ingrediente, i.descricao AS descricao_ingrediente, c.quantidade, u.sigla FROM composicao c
                INNER JOIN prato p
                ON c.cod_prato = p.cod_prato
                INNER JOIN ingrediente i
                ON c.cod_ingrediente = i.cod_ingrediente
                INNER JOIN unidade u
                ON i.cod_unidade = u.cod_unidade
                ORDER BY c.cod_prato;
                '
            );
        }

        public function listarComposicaoPorPrato($cod_prato){
            return DB::select(
                'SELECT c.cod_prato, p.descricao AS descricao_prato, c.cod_ingrediente, i.descricao AS descricao_ingrediente, c.quantidade, u.sigla FROM composicao c
                INNER JOIN prato p
                ON c.cod_prato = p.cod_prato
                INNER JOIN ingrediente i
                ON c.cod_ingrediente = i.cod_ingrediente
                INNER JOIN unidade u
                ON i.cod_unidade = u.cod_unidade
                WHERE c.cod_prato = ?
                ORDER BY c.cod_prato;
                ', 
                [$cod_prato]
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