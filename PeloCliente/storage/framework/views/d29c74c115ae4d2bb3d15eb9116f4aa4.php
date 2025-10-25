<!DOCTYPE html>
<html>
    <body>
        <table>
            <thead>
                <tr>
                    <th>Descrição</th>
                    <th>Quantidade</th>
                    <th>Unidade</th>
                    <th>Valor Unitário</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>

            <tbody>
                <?php $__currentLoopData = $ingredientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ingrediente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($ingrediente->descricao); ?></td>
                        <td><?php echo e($ingrediente->quantidade); ?></td>
                        <td><?php echo e($ingrediente->sigla); ?></td>
                        <td>R$ <?php echo e(number_format($ingrediente->valor_unit, 2, ',', '.')); ?></td>

                        <td>
                            <a href="<?php echo e(route('ingredienteEditar', $ingrediente->cod_ingrediente)); ?>">Editar</a>
                        </td>
                        <td>
                            <a href="<?php echo e(route('ingredienteExcluir', $ingrediente->cod_ingrediente)); ?>">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </body>
</html>
<?php /**PATH C:\Users\Pichau\Documents\pelocliente_pasta_local\PeloCliente\resources\views/ingrediente.blade.php ENDPATH**/ ?>