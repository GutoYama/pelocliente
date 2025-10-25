<!DOCTYPE html>
<html>
    <body>
        <table>
            <thead>
                <tr>
                    <th>Descrição</th>
                    <th>Sigla</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>

            <tbody>
                <?php $__currentLoopData = $unidades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unidade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($unidade->descricao); ?></td>
                        <td><?php echo e($unidade->sigla); ?></td>

                        <td>
                            <a href="<?php echo e(route('unidadeEditar', $unidade->cod_unidade)); ?>">Editar</a>
                        </td>
                        <td>
                            <a href="<?php echo e(route('unidadeExcluir', $unidade->cod_unidade)); ?>">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </body>
</html>
<?php /**PATH C:\Users\Pichau\Documents\pelocliente_pasta_local\PeloCliente\resources\views/unidade.blade.php ENDPATH**/ ?>