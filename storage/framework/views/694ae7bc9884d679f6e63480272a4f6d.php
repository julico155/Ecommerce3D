<?php $__env->startSection('producto'); ?>
    <div class="container mx-auto px-4 my-4">
        <div class="flex flex-col items-center sm:flex-row">
            <div class="mt-4 sm:ml-4">
                <a href="<?php echo e(route('categoria.index')); ?>" class="bg-indigo-500 hover:bg-indigo-700 text-white px-4 py-2 rounded-md transition duration-300 ease-in-out">
                    Categorías
                </a>
            </div>
            <div class="mt-4 sm:ml-4">
                <a href="<?php echo e(route('marca.index')); ?>" class="bg-teal-500 hover:bg-teal-700 text-white px-4 py-2 rounded-md transition duration-300 ease-in-out">
                    Marcas
                </a>
            </div>
            <div class="mt-4 sm:ml-4">
                <a href="<?php echo e(route('producto.index')); ?>" class="bg-orange-500 hover:bg-orange-700 text-white px-4 py-2 rounded-md transition duration-300 ease-in-out">
                    Productos
                </a>
            </div>
            <div class="mt-4 sm:ml-4">
                <a href="<?php echo e(route('talla.index')); ?>" class="bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded-md transition duration-300 ease-in-out">
                    Tallas
                </a>
            </div>
            <div class="mt-4 sm:ml-4">
                <a href="<?php echo e(route('color.index')); ?>" class="bg-red-500 hover:bg-red-700 text-white px-4 py-2 rounded-md transition duration-300 ease-in-out">
                    Colores
                </a>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-2 gap-6">
        <div class="w-full lg:w-2/3 mx-auto mb-4">
            <h2 class="text-2xl font-bold text-black my-4 ml-4">
                Categorias</h2>
            <form action="<?php echo e(route('categoria.store')); ?>" method="POST" enctype="multipart/form-data"
                class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <?php echo csrf_field(); ?>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="categoria">Nombre Categoria:</label>
                    <input type="text" name="categoria" id="categoria"
                        class="border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                </div>

                <div class="flex items-center justify-between mb-4">
                    <button type="submit"
                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Guardar</button>
                </div>
            </form>
        </div>

        <div class="w-full lg:w-3/4 mx-4 mb-4">
            <div class="overflow-x-auto my-6 shadow-md rounded">
                <table class="min-w-full border border-gray-200 mt-4">
                    <thead>
                        <tr>
                            <th class="bg-gray-100 text-center px-6 py-3">#</th>
                            <th class="bg-gray-100 text-center px-6 py-3">Categoria</th>
                            <th class="bg-gray-100 text-center px-6 py-3">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td class="text-center py-2 px-4 border-b">
                                    <p class="font-semibold text-left">
                                        <?php echo e($categoria->id); ?></p>
                                </td>

                                <td class="text-center py-2 px-4 border-b">
                                    <p class="font-semibold text-left">
                                        <?php echo e($categoria->categoria); ?>

                                    </p>
                                </td>

                                <td class="text-center py-2 px-4 border-b">
                                    <a href="<?php echo e(route('categoria.edit', $categoria)); ?>"
                                        class="text-green-500 hover:text-green-700 mr-2">
                                        Edit
                                    </a>
                                    <form action="<?php echo e(route('categoria.destroy', $categoria->id)); ?>" method="POST"
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

<?php echo $__env->make('dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Proyectos\SI2\TiendaRopa\resources\views/VistaCategoria/index.blade.php ENDPATH**/ ?>