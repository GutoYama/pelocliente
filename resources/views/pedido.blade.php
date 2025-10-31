<html>
<head></head>
<body>
    @include('partials.nav',['x' => 8])
    <main>
        @foreach($pedido->dados_do_pedido as $dados)
            <h1>$dados->descricao</h1>
        @endforeach
    </main>
</body>
</html>