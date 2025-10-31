<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use Carbon\Carbon;

use App\Models\Cliente;
use App\Models\Fornecedor;
use App\Models\Prato;
use App\Models\Ingrediente;
use App\Models\Composicao;
use App\Models\Compra;
use App\Models\Unidade;
use App\Models\Pedido;
use App\Models\Itens_pedido;

Route::get('/', function () {
    return view('menu');
})->name('menu');


// ====================================================================================

// FORNECEDORES
Route::get('/fornecedor', function(){
    $fornecedor = new Fornecedor;
    
    return view ('fornecedor', ['fornecedores'=>$fornecedor->listarFornecedor()]);
})->name('fornecedor');


Route::get('/fornecedor/adicionar', function(){
    return view ('adicionarfornecedor');
});

Route::post('/fornecedor/adicionar_bd', function(Request $request){
    $fornecedor = new Fornecedor;

    $fornecedor->addFornecedor(
        $request->input('nome_fantasia'),
        $request->input('endereco'),
        $request->input('cnpj'),
        $request->input('telefone')
    );
    
    return redirect()->route('fornecedor');
});


Route::get('/fornecedorEditar', function(Request $request){
    $fornecedor = new Fornecedor;
    $cod_fornecedor = (int)$request->query('id');

    return view('editarfornecedor', ['fornecedor' => $fornecedor->selectFornecedor($cod_fornecedor)]);

})->name('fornecedorEditar');

Route::get('/fornecedorEditar_bd', function(Request $request){
    $fornecedor = new Fornecedor;
    
    $fornecedor->updateFornecedor(
        $request->query('cod_fornecedor'),
        $request->query('nome_fantasia'),
        $request->query('endereco'),
        $request->query('cnpj'),
        $request->query('telefone')
    );

    return redirect()->route('fornecedor');
});


Route::get('/fornecedorExcluir', function(){
    return view('welcome');
})->name('fornecedorExcluir');


// ====================================================================================

// CLIENTES
Route::get('/cliente', function(){
    $cliente = new Cliente;
    
    return view ('cliente', ['clientes'=>$cliente->listarCliente()]);
})->name('cliente');


Route::get('/cliente/adicionar', function() {
    return view('adicionarcliente');
});

Route::post('/cliente/adicionar_bd', function(Request $request) {
    $cliente = new Cliente;

    $cliente->addCliente(
        $request->input('nome'),
        $request->input('cpf'),
        $request->input('endereco'),
        $request->input('telefone'),
        $request->input('email')
    );

    return redirect()->route('cliente');
}); 



Route::get('/clienteEditar', function(Request $request){
    $cliente = new Cliente;
    $cod_cliente = (int)$request->query('id');

    return view('editarcliente', ['cliente'=>$cliente->selectCliente($cod_cliente)]);
})->name('clienteEditar');

Route::get('/clienteEditar_bd', function (Request $request){
    $cliente = new Cliente;
    
    $cliente->updateCliente(
        $request->query('cod_cliente'), 
        $request->query('nome'),
        $request->query('cpf'),
        $request->query('endereco'),
        $request->query('telefone'),
        $request->query('email')
    );

    return redirect()->route('cliente');
});

Route::get('/clienteExcluir', function(){
    return view('welcome');
})->name('clienteExcluir');


// ====================================================================================

// PRATOS
Route::get('/prato', function(){
    $prato = new Prato;
    
    return view ('prato', ['pratos'=>$prato->listarPrato()]);
})->name('prato');


Route::get('/prato/adicionar', function() {
    return view('adicionarprato');
});

Route::post('/prato/adicionar_bd', function(Request $request) {
    $prato = new Prato;

    $prato->addPrato(
        $request->input('descricao'),
        $request->input('valor')
    );

    return redirect()->route('prato');
});



Route::get('/pratoEditar', function(Request $request){
    $prato = new Prato;
    $cod_prato = (int)$request->query('id');

    return view('editarprato', ['prato'=>$prato->selectPrato($cod_prato)]);
})->name('pratoEditar');


Route::get('/pratoEditar_bd', function(Request $request){
    $prato = new Prato;

    $prato->updatePrato(
        $request->query('cod_prato'),
        $request->query('descricao'),
        $request->query('valor')
    );

    return redirect()->route('prato');
});


Route::get('/pratoExcluir', function(){
    return view('welcome');
})->name('pratoExcluir');


// ====================================================================================

// INGREDIENTES
Route::get('/ingrediente', function(){
    $ingrediente = new Ingrediente;
    
    return view ('ingrediente', ['ingredientes'=>$ingrediente->listarIngrediente()]);
})->name('ingrediente');



Route::get('/ingrediente/adicionar', function() {
    $unidade = new Unidade;
    
    return view('adicionaringrediente', ['unidades'=>$unidade->listarUnidade()]);
});

Route::post('/ingrediente/adicionar_bd', function(Request $request) {
    $ingrediente = new Ingrediente;

    $ingrediente->addIngrediente(
        $request->input('descricao'),
        $request->input('quantidade'),
        $request->input('unidade'),
        $request->input('valor_unit')
    );

    return redirect()->route('ingrediente');
});



Route::get('/ingredienteEditar', function(Request $request){
    $ingrediente = new Ingrediente;
    $cod_ingrediente = (int)$request->query('id');

    $unidade = new Unidade;

    return view('editaringrediente', ['ingrediente'=>$ingrediente->selectIngrediente($cod_ingrediente), 'unidades'=>$unidade->listarUnidade()]);
})->name('ingredienteEditar');

Route::get('/ingredienteEditar_bd', function(Request $request){
     $ingrediente = new Ingrediente;

    $ingrediente->updateIngrediente(
        $request->query('cod_ingrediente'),
        $request->query('descricao'),
        $request->query('quantidade'),
        $request->query('cod_unidade'),
        $request->query('valor_unit')
    );

    return redirect()->route('ingrediente');
});



Route::get('/ingredienteExcluir', function(){
    return view('welcome');
})->name('ingredienteExcluir');


// ====================================================================================

// COMPOSICOES
Route::get('/composicao', function(){
    $composicao = new Composicao;
    
    $composicoes = $composicao->listarComposicao();
    $composicoes_separadas = [];

    for ($i = 0; $i < count($composicoes); $i++)
    {      
        $composicao_unica = [];

        while ($composicoes[$i]->cod_prato == $composicoes[$i+1]->cod_prato)
        {
            $composicao_unica[] = $composicoes[$i];
            $i++;

            if ($i+1 == count($composicoes))
                break;
        }

        $composicao_unica[] = $composicoes[$i];
        
        $composicoes_separadas[] = $composicao_unica;
    }

    return view ('composicao', ['composicoes'=>$composicoes_separadas]);
})->name('composicao');



Route::get('/composicao/listar_composicoes', function(Request $request){
    $composicao = new Composicao;
    $cod_prato = (int)$request->query('id');

    $composicoes = $composicao->listarComposicaoPorPrato($cod_prato);

    return response()->json([
        'composicoes' => $composicoes
    ]);
});


Route::get('/composicao/adicionar', function(){
    $prato = new Prato;
    $ingrediente = new Ingrediente;

    return view('adicionarcomposicao', ['pratos'=>$prato->listarPrato(), 'ingredientes'=>$ingrediente->listarIngrediente()]); 
});

Route::post('/composicao/adicionar_bd', function(Request $request){
    
    $totalDeIngredientes = $request->input('totaldeingredientes');
    $cod_prato = $request->input('prato');

    $composicao = new Composicao;

    for ($i = 1; $i <= $totalDeIngredientes; $i++)
    {
        $cod_ingrediente = $request->input('ingrediente' . $i);
        $quantidade = $request->input('quantidadeingrediente' . $i);
        
        $composicao->addComposicao($cod_prato, $cod_ingrediente, $quantidade);
    }

    
    return redirect()->route('composicao');
});



Route::get('/composicaoEditar', function(Request $request){
    $composicao = new Composicao;
    $cod_prato = (int)$request->query('id');

    $ingrediente = new Ingrediente;
    
    return view('editarcomposicao', ['composicoes'=>$composicao->listarComposicaoPorPrato($cod_prato), 'ingredientes'=>$ingrediente->listarIngrediente()]);
})->name('composicaoEditar');

Route::post('/composicaoEditar_bd', function(Request $request){
    $composicao = new Composicao;
    $cod_prato = (int)$request->input('cod_prato');

    $numIngredientes = count($request['cod_ingrediente']);

    //dd($request->all());

    for ($i = 0; $i < $numIngredientes; $i++)
    {
        $composicao->updateComposicao($cod_prato, (int)$request['cod_ingrediente'][$i], (float)$request['quantidade'][$i]);
    }
    
    return redirect()->route('composicao');
});



Route::get('/composicaoExcluir', function(){
    return view('welcome');
})->name('composicaoExcluir');


// ====================================================================================

// COMPRAS
Route::get('/compra', function(){
    $compra = new Compra;
    
    return view ('compra', ['compras'=>$compra->listarCompra()]);
})->name('compra');



Route::get('/compra/adicionar', function() {
    $ingrediente = new Ingrediente;
    $fornecedor = new Fornecedor;
    
    return view('adicionarcompra', ['ingredientes'=>$ingrediente->listarIngrediente(), 'fornecedores'=>$fornecedor->listarFornecedor()]);
});

Route::post('/compra/adicionar_bd', function(Request $request) {
    $compra = new Compra;

    $compra->addCompra(
        $request->input('ingrediente'),
        $request->input('fornecedor'),
        $request->input('quantidade')
    );

    return redirect()->route('compra');
});



Route::get('/compraEditar', function(Request $request){
    $compra = new Compra;
    $cod_compra = $request->query('id');

    $ingrediente = new Ingrediente;
    $fornecedor = new Fornecedor;

    return view ('editarcompra', ['compra'=>$compra->selectCompra($cod_compra), 
        'ingredientes'=>$ingrediente->listarIngrediente(),
         'fornecedores'=>$fornecedor->listarFornecedor()]);
})->name('compraEditar');

Route::get('/compraEditar_bd', function (Request $request) {
    $compra = new Compra;

    $compra->updateCompra(
        $request->query('cod_compra'),
        $request->query('cod_ingrediente'),
        $request->query('cod_fornecedor'),
        $request->query('quantidade')
    );

    return redirect()->route('compra');
});



Route::get('/compraExcluir', function(){
    return view('welcome');
})->name('compraExcluir');


// ====================================================================================

// UNIDADES
Route::get('/unidade', function(){
    $unidade = new Unidade;
    
    return view ('unidade', ['unidades'=>$unidade->listarUnidade()]);
})->name('unidade');


Route::get('/unidade/adicionar', function() {
    return view('adicionarunidade');
});

Route::post('/unidade/adicionar_bd', function(Request $request) {
    $unidade = new Unidade;

    $unidade->addUnidade(
        $request->input('descricao'),
        $request->input('sigla')
    );

    return redirect()->route('unidade');
});



Route::get('/unidadeEditar', function(Request $request){
    $unidade = new Unidade;
    $cod_unidade = (int)$request->query('id');

    return view('editarunidade', ['unidade'=>$unidade->selectUnidade($cod_unidade)]);
})->name('unidadeEditar');

Route::get('/unidadeEditar_bd', function(Request $request){
    $unidade = new Unidade;

    $unidade->updateUnidade(
        $request->query('cod_unidade'),
        $request->query('descricao'),
        $request->query('sigla')
    );

    return redirect()->route('unidade');
})->name('unidadeEditar');



Route::get('/unidadeExcluir', function(){
    return view('welcome');
})->name('unidadeExcluir');

// ====================================================================================

// PEDIDOS
Route::get('/pedido', function(){
    $pedido = new Pedido;
    $itens_pedido = new Itens_pedido;

    $pedidos = $pedido->listarPedido();

    $dadosPedido = [];

    for ($i = 0; $i < count($pedidos); $i++)
    {
        $dadosPedido[] = ['dados_do_pedido'=>$pedidos[$i]];
        $dadosPedido[$i]['itens_do_pedido'] = $itens_pedido->listarItens_pedidoPorPedido($pedidos[$i]->cod_pedido);
    }

    //dd($dadosPedido);
    

    return view('pedido', ['pedidos'=>$dadosPedido]);
});


Route::get('/pedido/adicionar', function(){
    $cliente = new Cliente;
    $prato = new Prato;

    return view('adicionarpedido', ['clientes'=>$cliente->listarCliente(), 'pratos'=>$prato->listarPrato()]);
});


Route::post('/pedido/adicionar_bd', function(Request $request){
    $pedido = new Pedido;
    $cod_cliente = (int)$request->input('cliente');

    $cliente = new Cliente;
    $endereco = "";

    if ($cod_cliente == 0)
    {
        $endereco = $request->input('enderecoNaoCadastrado');
    }
    else
    {
        $endereco = $cliente->selectCliente($cod_cliente)[0]->endereco;
    }

    // Fiz uma modificação pra ele retornar o cod_pedido
    $cod_pedido = $pedido->addPedido($cod_cliente, 0, $endereco, Carbon::now());

    $itens_pedido = new Itens_pedido;

    $totalDePratos = count($request['pratos']);

    for ($i = 0; $i < $totalDePratos; $i++)
    {
        $itens_pedido->addItens_pedido($request['pratos'][$i], $cod_pedido, $request['quantidades'][$i]);
    }

    return redirect()->route('menu');
});

Route::get('/pedidoEditar', function(Request $request){
    $itens_pedido = new Itens_pedido;
    $pedido = new Pedido;
    
    $cod_pedido = $request->query('id');
    $dados_do_pedido = $pedido->selectPedido($cod_pedido);

    $cliente = new Cliente;
    $cod_cliente = $pedido->cod_cliente;

    $prato = new Prato;

    return view('editarpedido', ['temcliente'=>true, 'clientes'=>$cliente->listarCliente(), 'cod_cliente'=>$cod_cliente, 'pedido'=>$dados_do_pedido, 'itens_pedido'=>$itens_pedido->listarItens_pedidoPorPedido($cod_pedido), 'pratos'=>$prato->listarPrato()]);
});

Route::get('/pedidoEditar_bd', function(Request $request){
    $pedido = new Pedido;
    $dados_pedido = $pedido->selectPedido($request->query('cod_pedido'));

    $pedido->updatePedido($dados_pedido[0]->cod_pedido, $request->query('cliente'), 0, $request->query('enderecoEntrega'), $dados_pedido[0]->datahora);

    $itens_pedido = new Itens_pedido;

    $itens_pedido->deleteItens_pedidoPorPedido($request->query('cod_pedido'));

    $totalDePratos = count($request['pratos']);
    for ($i = 0; $i < $totalDePratos; $i++)
    {
        $itens_pedido->addItens_pedido($request['pratos'][$i], $request->query('cod_pedido'), $request['quantidades'][$i]);
    }

    return view('menu');
});

