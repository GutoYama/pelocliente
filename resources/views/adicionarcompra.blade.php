<!DOCTYPE html>
<html>
    <body>        
        <form action="/compra/adicionar_bd" method="POST">
            @csrf

            <label>Ingrediente</label>
            <select id="ingrediente" name="ingrediente">
                @foreach($ingredientes as $ingrediente)
                    <option value="{{ $ingrediente->cod_ingrediente }}" data-valor_unitario="{{$ingrediente->valor_unit}}">{{ $ingrediente->descricao }}</option>
                @endforeach
            </select>

            <label>Fornecedor</label>
            <select id="fornecedor" name="fornecedor">
                @foreach($fornecedores as $fornecedor)
                    <option value="{{ $fornecedor->cod_fornecedor }}">{{ $fornecedor->nome_fantasia }}</option>
                @endforeach
            </select>

            <label>Quantidade</label>
            <input id="quantidade" name="quantidade" type="number" value=0></input>

            <input type="submit" value="Lançar Compra"></input>
        </form>

        <p>Valor total da compra: </p> <div id="valor_total"></div>
    </body>

    <script>
        function calculaValorTotal(){
            var valor_unitario = parseFloat(document.getElementById('ingrediente').selectedOptions[0].dataset.valor_unitario);
            var quantidade = parseFloat(document.getElementById('quantidade').value)

            document.getElementById('valor_total').innerText = "R$ " + quantidade * valor_unitario;
        }
        
        calculaValorTotal();

        document.getElementById('ingrediente').addEventListener('change', calculaValorTotal);
        document.getElementById('quantidade').addEventListener('input', calculaValorTotal);
    </script>
</html>
