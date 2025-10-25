<!DOCTYPE html>
<html>
    <body>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Endereço</th>
                    <th>Telefone</th>
                    <th>Email</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>

            <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($cliente->nome); ?></td>
                    <td><?php echo e($cliente->cpf); ?></td>
                    <td><?php echo e($cliente->endereco); ?></td>
                    <td><?php echo e($cliente->telefone); ?></td>
                    <td><?php echo e($cliente->email); ?></td>

                    <td>
                        <a href="<?php echo e(route('clienteEditar', $cliente->cod_cliente)); ?>">Editar</a>
                    </td>
                    <td>
                        <a href="<?php echo e(route('clienteExcluir', $cliente->cod_cliente)); ?>">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </table>
    </body>
</html>
<?php /**PATH C:\Users\Pichau\Documents\pelocliente_pasta_local\PeloCliente\resources\views/cliente.blade.php ENDPATH**/ ?>