<?php if(request()->isMethod('post')): ?>
    <div class="alert alert-success">
        Pedidos realizados con exito.
    </div>
<?php endif; ?>
<?php $__env->startSection('compra'); ?>

    <div class="flex flex-col items-center sm:flex-row">
        <div class="mt-4 sm:ml-4">
            <a href="<?php echo e(route('pedido.index')); ?>" class="bg-indigo-500 hover:bg-indigo-700 text-white px-4 py-2 rounded-md transition duration-300 ease-in-out">
                Solicitar Pedidos
            </a>
        </div>
        <div class="mt-4 sm:ml-4">
            <a href="<?php echo e(route('compra.index')); ?>" class="bg-teal-500 hover:bg-teal-700 text-white px-4 py-2 rounded-md transition duration-300 ease-in-out">
                Notas de compras a proveedores
            </a>
        </div>
        <div class="mt-4 sm:ml-4">
            <a href="<?php echo e(route('proveedor.index')); ?>" class="bg-orange-500 hover:bg-orange-700 text-white px-4 py-2 rounded-md transition duration-300 ease-in-out">
                Proveedores
            </a>
        </div>
    </div>

    <div class="my-8 mx-8">
        <div class="container mx-auto px-4">
            <form action="<?php echo e(route('pedido.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="mb-8">
                    <h2 class="text-lg font-bold">Solicitar Pedido</h2>
                </div>
                <table class="min-w-full border border-gray-200 mt-4">
                    <thead>
                        <tr>
                            <th class="bg-gray-200 py-2">Producto</th>
                            <th class="bg-gray-200 py-2">Descripción</th>
                            <th class="bg-gray-200 py-2">Stock</th>
                            <th class="bg-gray-200 py-2">Stock Mínimo</th>
                            <th class="bg-gray-200 py-2">Actualizar Stock</th>
                            <th class="bg-gray-200 py-2">Proveedor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $arrayProductos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="py-2 text-center"><?php echo e($p['producto_nombre']); ?></td>
                                <td class="py-2 text-center">
                                    <p class="font-semibold">
                                        <?php echo e($p['producto_descripcion']); ?>

                                    </p>
                                    
                                </td>
                                <td class="py-2 text-center"><?php echo e($p['producto_stock']); ?></td>
                                <td class="py-2 text-center"><?php echo e($p['producto_stock_min']); ?></td>
                                <td class="py-2 text-center">
                                    <input type="number" name="stock[]" class="w-20 px-2 py-1" placeholder="0">
                                    <input type="number" name="id_producto[]" class="hidden" value="<?php echo e($p['producto_id']); ?>">
                                    <input type="text" name="nombre_proveedor[]" class="hidden" value="<?php echo e($p['proveedor']); ?>">
                                </td>
                                <td class="py-2 text-center">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="proveedor"></label>
                                    <select name="proveedor[]" id="proveedor" required class="border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                                        <option selected disabled>Elige un Proveedor</option>
                                        <?php $__currentLoopData = $p['proveedor']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proveedor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($proveedor->id); ?>"><?php echo e($proveedor->Nombre); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </td>


                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <div class="flex justify-end">
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md">Solicitar Pedido</button>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Julio\Downloads\TiendaRopa-main\TiendaRopa-main\resources\views/VistaPedido/index.blade.php ENDPATH**/ ?>