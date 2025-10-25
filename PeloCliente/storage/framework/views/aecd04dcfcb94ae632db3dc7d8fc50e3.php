<!DOCTYPE html>
<html>
    <body>
        <table>
            <thead>
                <tr>
                    <th>Descrição</th>
                    <th>Valor</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>

            <?php $__currentLoopData = $pratos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($prato->descricao); ?></td>
                    <td><?php echo e($prato->valor); ?></td>

                    <td>
                        <a href="<?php echo e(route('pratoEditar', $prato->cod_prato)); ?>">Editar</a>
                    </td>
                    <td>
                        <a href="<?php echo e(route('pratoExcluir', $prato->cod_prato)); ?>">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </table>
    </body>
</html>
<?php /**PATH C:\Users\Pichau\Documents\pelocliente_pasta_local\PeloCliente\resources\views/prato.blade.php ENDPATH**/ ?>