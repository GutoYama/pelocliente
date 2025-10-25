<!DOCTYPE html>
<html>
    <body>
        <table>
            <thead>
                <tr>
                    <th>Nome Fantasia</th>
                    <th>Endereço</th>
                    <th>CNPJ</th>
                    <th>Telefone</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>

            <?php $__currentLoopData = $fornecedores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fornecedor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($fornecedor->nome_fantasia); ?></td>
                    <td><?php echo e($fornecedor->endereco); ?></td>
                    <td><?php echo e($fornecedor->cnpj); ?></td>
                    <td><?php echo e($fornecedor->telefone); ?></td>
                    
                    <td> <a href="<?php echo e(route('fornecedorEditar', $fornecedor->cod_fornecedor)); ?>">Editar</a> </td>
                    <td> <a href="<?php echo e(route('fornecedorExcluir', $fornecedor->cod_fornecedor)); ?>">Excluir</a> </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </table>
    </body>
</html><?php /**PATH C:\Users\Pichau\Documents\pelocliente_pasta_local\PeloCliente\resources\views/fornecedor.blade.php ENDPATH**/ ?>