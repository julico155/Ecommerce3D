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

    <div class="container mx-auto px-4 my-4">
        <div class="flex flex-col items-center sm:flex-row">
            <div class="mt-4 sm:ml-4">
                <a href="<?php echo e(route('proveedor.create')); ?>" class="bg-green-500 text-white px-4 py-2 rounded-md mr-2">Registrar
                    Proveedor</a>
            </div>
        </div>
        <div class="w-full lg:w-1/2 mx-auto mb-4">
            <div class="overflow-x-auto my-6 shadow-md rounded">
                <table class="min-w-full border border-gray-200 mt-4">
                    <thead>
                        <tr>
                            <th class="bg-gray-200 py-2 px-4 border-b text-left">#</th>
                            <th class="bg-gray-200 py-2 px-4 border-b text-left">Nombre</th>
                            <th class="bg-gray-200 py-2 px-4 border-b text-left">Telefono</th>
                            <th class="bg-gray-200 py-2 px-4 border-b text-left">Marca</th>
                            <th class="bg-gray-200 py-2 px-4 border-b">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $arrayProveedores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td class="text-center py-2 px-4 border-b">
                                    <p class="font-semibold text-left">
                                        <?php echo e($p['proveedor_id']); ?></p>
                                </td>

                                <td class="text-center py-2 px-4 border-b">
                                    <p class="font-semibold text-left">
                                        <?php echo e($p['producto_Nombre']); ?>

                                    </p>
                                </td>
                                <td class="text-center py-2 px-4 border-b">
                                    <p class="font-semibold text-left">
                                        <?php echo e($p['producto_Telefono']); ?>

                                    </p>
                                </td>
                                <td class="text-center py-2 px-4 border-b">
                                    <p class="font-semibold text-left">
                                        <?php echo e($p['marca']); ?>

                                    </p>
                                </td>
                                <td class="text-center py-2 px-4 border-b">
                                    <a href="<?php echo e(route('proveedor.edit', $p['proveedor_id'])); ?>"
                                        class="text-blue-500 hover:text-green-700 mr-2">
                                        Editar
                                    </a>
                                    <form action="<?php echo e(route('proveedor.destroy', $p['proveedor_id'])); ?>" method="POST"
                                        class="inline-block">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="text-red-500 hover:text-red-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash"
                                                width="20" height="20" viewBox="0 0 24 24" stroke-width="2.5"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" />
                                                <line x1="4" y1="7" x2="20" y2="7" />
                                                <line x1="10" y1="11" x2="10" y2="17" />
                                                <line x1="14" y1="11" x2="14" y2="17" />
                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>

                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <td class="text-center py-2 px-4 border-b">id</td>
                            <td class="text-center py-2 px-4 border-b">nombre</td>
                            <td class="text-center py-2 px-4 border-b">telf</td>
                            <td class="text-center py-2 px-4 border-b">
                                <div class="flex justify-center">
                                    editar
                                </div>
                            </td>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Proyectos\SI2\TiendaRopa\resources\views/VistaProveedor/index.blade.php ENDPATH**/ ?>