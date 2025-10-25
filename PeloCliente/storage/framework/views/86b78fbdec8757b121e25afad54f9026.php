<!DOCTYPE html>
<html>
    <body>
        <table>
            <thead>
                <tr>
                    <th>Quantidade</th>
                    <th>Ingrediente</th>
                    <th>Fornecedor</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>

            <tbody>
                <?php $__currentLoopData = $compras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $compra): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($compra->quantidade); ?> <?php echo e($compra->sigla); ?></td>
                        <td><?php echo e($compra->descricao_ingrediente); ?></td>
                        <td><?php echo e($compra->nome_fantasia); ?></td>

                        <td>
                            <a href="<?php echo e(route('compraEditar', $compra->cod_compra)); ?>">Editar</a>
                        </td>
                        <td>
                            <a href="<?php echo e(route('compraExcluir', $compra->cod_compra)); ?>">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </body>
</html>
<?php /**PATH C:\Users\Pichau\Documents\pelocliente_pasta_local\PeloCliente\resources\views/compra.blade.php ENDPATH**/ ?>