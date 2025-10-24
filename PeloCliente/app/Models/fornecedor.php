<?php
    namespace App\Models;

    final class Fornecedor {
        public $cod_fornecedor;
        public $nome_fantasia;
        public $endereco;
        public $cnpj;
        public $telefone;

        public function addFornecedor($nome_fantasia, $endereco, $cnpj, $telefone){
            DB::insert(
                'INSERT INTO fornecedor (nome_fantasia, endereco, cnpj, telefone) VALUES (?, ?, ?, ?)',
                [$nome_fantasia, $endereco, $cnpj, $telefone]
            );
        }
    
        public function updateFornecedor($cod_fornecedor, $nome_fantasia, $endereco, $cnpj, $telefone){
            DB::update(
                'UPDATE fornecedor SET nome_fantasia=?, endereco=?, cnpj=?, telefone=? WHERE cod_fornecedor=?',
                [$nome_fantasia, $endereco, $cnpj, $telefone, $cod_fornecedor]
            );
        }
    
        public function selectFornecedor($cod_fornecedor){
            return DB::select(
                'SELECT * FROM fornecedor WHERE cod_fornecedor=?',
                [$cod_fornecedor]
            );
        }
    
        public function deleteFornecedor($cod_fornecedor){
            DB::delete(
                'DELETE FROM fornecedor WHERE cod_fornecedor=?',
                [$cod_fornecedor]
            );
        }    
    }
?>