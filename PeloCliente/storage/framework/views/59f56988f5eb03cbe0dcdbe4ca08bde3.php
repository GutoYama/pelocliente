<!DOCTYPE html>
<html>
    <body>
        <table>
            <thead>
                <tr>
                    <th>Quantidade</th>
                    <th>Ingrediente</th>
                    <th>Prato</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>

            <tbody>
                <?php $__currentLoopData = $composicoes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($comp->quantidade); ?> <?php echo e($comp->sigla); ?></td>
                        <td><?php echo e($comp->descricao_ingrediente); ?></td>
                        <td><?php echo e($comp->descricao_prato); ?></td>

                        <td>
                            <a href="<?php echo e(route('composicaoEditar', [$comp->cod_prato, $comp->cod_ingrediente])); ?>">Editar</a>
                        </td>
                        <td>
                            <a href="<?php echo e(route('composicaoExcluir', [$comp->cod_prato, $comp->cod_ingrediente])); ?>">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </body>
</html>
<?php /**PATH C:\Users\Pichau\Documents\pelocliente_pasta_local\PeloCliente\resources\views/composicao.blade.php ENDPATH**/ ?>