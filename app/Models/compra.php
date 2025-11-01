<?php
    namespace App\Models;
    use Illuminate\Support\Facades\DB;

    final class Compra{
        public $cod_compra;
        public $cod_ingrediente;
        public $cod_fornecedor;
        public $quantidade;
        public $datahora;

        public function addCompra($cod_ingrediente, $cod_fornecedor, $quantidade, $datahora){
            DB::insert(
                'INSERT INTO compra (cod_ingrediente, cod_fornecedor, quantidade, datahora) VALUES (?, ?, ?, ?)',
                [$cod_ingrediente, $cod_fornecedor, $quantidade, $datahora]
            );
        }
    
        public function updateCompra($cod_compra, $cod_ingrediente, $cod_fornecedor, $quantidade){
            DB::update(
                'UPDATE compra SET cod_ingrediente=?, cod_fornecedor=?, quantidade=? WHERE cod_compra=?',
                [$cod_ingrediente, $cod_fornecedor, $quantidade, $cod_compra]
            );
        }
    
        public function selectCompra($cod_compra){
            return DB::select(
                'SELECT * FROM compra WHERE cod_compra=?',
                [$cod_compra]
            );
        }

        public function listarMesesComCompraOuPedido(){
            return DB::select('
                SELECT MIN(data_ref) AS datahora
                FROM (
                    SELECT datahora AS data_ref FROM compra
                    UNION
                    SELECT datahora AS data_ref FROM pedido
                ) AS d
                GROUP BY YEAR(data_ref), MONTH(data_ref)
                ORDER BY datahora DESC;
            ');
        }

        public function listarCompra(){
            return DB::select(
                'SELECT c.cod_compra, c.cod_ingrediente, i.descricao AS descricao_ingrediente, c.cod_fornecedor, f.nome_fantasia, c.quantidade, c.datahora, u.sigla FROM compra c
                INNER JOIN ingrediente i
                ON c.cod_ingrediente = i.cod_ingrediente
                INNER JOIN fornecedor f
                ON c.cod_fornecedor = f.cod_fornecedor
                INNER JOIN unidade u
                ON i.cod_unidade = u.cod_unidade
                ORDER BY c.datahora DESC'
            );
        }
    
        public function deleteCompra($cod_compra){
            DB::delete(
                'DELETE FROM compra WHERE cod_compra=?',
                [$cod_compra]
            );
        }

        public function selectValorTotalComprado($data){
            return DB::select(
                'select total_compras_mes(?) as total',
                [$data]
            );
        }

        public function selectLucro(){
            return DB::select(
                'SELECT nome_mes(c.datahora) as data, sum(c.quantidade * i.valor_unit) as totalcomprado, total_vendido_mes(c.datahora) as totalvendido, total_vendido_mes(c.datahora) - sum(c.quantidade * i.valor_unit) as Lucro
                FROM compra c
                INNER JOIN ingrediente i
                ON c.cod_ingrediente = i.cod_ingrediente
                GROUP BY YEAR(c.datahora), MONTH(c.datahora)'
            );
        }
    
    }
?>