<?php
    namespace App\Models;
    use Illuminate\Support\Facades\DB;

    final class Cliente{
        public $cod_cliente;
        public $nome;
        public $cpf;
        public $endereco;
        public $telefone;
        public $email;

        public function addCliente($nome, $cpf, $endereco, $telefone, $email){
            DB::insert('insert into cliente (nome, cpf, endereco, telefone, email) values (?, ?, ?, ?, ?)', [$nome, $cpf, $endereco, $telefone, $email]);
        }

        public function updateCliente($cod_cliente, $nome, $cpf, $endereco, $telefone, $email){
            DB::update('update cliente set nome=?, cpf=?, endereco=?,telefone=?, email=? where cod_cliente=?', [$nome, $cpf,$endereco,$telefone,$email,$cod_cliente]);
        }

        public function getCliente($cod_cliente){
            DB::select('select * from cliente where cod_cliente=?', [$cod_cliente]);
        }

        public function selectCliente($cod_cliente){
            return DB::select('select * from cliente where cod_cliente=?', [$cod_cliente]);
        }

        public function listarCliente(){
            return DB::select('select * from cliente');
        }

        public function deleteCliente($cod_cliente){
            DB::delete('delete from cliente where cod_cliente=?', [$cod_cliente]);
        }

        public function totalPedidos(){
            return DB::select(
                'select c.nome, COUNT(p.cod_cliente) as total_pedidos, SUM(p.valor_total) as total_gasto
                FROM cliente c
                INNER JOIN pedido p
                ON c.cod_cliente = p.cod_cliente
                GROUP BY c.cod_cliente, c.nome
                ORDER BY COUNT(p.cod_cliente) DESC'
            );
        }
    }
?>