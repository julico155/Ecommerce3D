<?php $__env->startSection('usuario'); ?>
<div class="container mx-auto px-4 my-4">

    <div class="flex flex-col items-center sm:flex-row">
        <div class="mt-4 sm:ml-4">
            <a href="<?php echo e(route('user.index')); ?>" class="bg-indigo-500 hover:bg-indigo-700 text-white px-4 py-2 rounded-md transition duration-300 ease-in-out">
                Usuarios
            </a>
        </div>
        <div class="mt-4 sm:ml-4">
            <a href="<?php echo e(route('rol.index')); ?>" class="bg-teal-500 hover:bg-teal-700 text-white px-4 py-2 rounded-md transition duration-300 ease-in-out">
                Roles
            </a>
        </div>
        <div class="mt-4 sm:ml-4">
            <a href="<?php echo e(route('permisos.index')); ?>" class="bg-orange-500 hover:bg-orange-700 text-white px-4 py-2 rounded-md transition duration-300 ease-in-out">
                Permisos
            </a>
        </div>
        <div class="mt-4 sm:ml-4">
            <a href="<?php echo e(route('bitacora.index')); ?>" class="bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded-md transition duration-300 ease-in-out">
                Bitacora
            </a>
        </div>
    </div>


    <div class="my-8 mx-8">
        <div class="container mx-auto">
            <div class="overflow-x-auto mx-auto bg-white shadow-md rounded px-8 py-6 mt-8">
                <h2 class="text-2xl text-black font-bold mb-6">Lista de Usuarios</h2>
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b">ID</th>
                            <th class="py-2 px-4 border-b">Nombre</th>
                            <th class="py-2 px-4 border-b">Email</th>
                            <th class="py-2 px-4 border-b">Rol</th>
                            <th class="py-2 px-4 border-b"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="py-2 px-4 border-b"><?php echo e($user->id); ?></td>
                            <td class="py-2 px-4 border-b"><?php echo e($user->name); ?></td>
                            <td class="py-2 px-4 border-b"><?php echo e($user->email); ?></td>
                            <td class="py-2 px-4 border-b">
                                <?php if($user->roles->isNotEmpty()): ?>
                                    <?php echo e($user->roles->first()->name); ?>

                                <?php else: ?>
                                    Sin Rol
                                <?php endif; ?>
                            </td>
                            <td class="py-2 px-4 border-b">
                                <a href="<?php echo e(route('user.edit', $user->id)); ?>"
                                    class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">
                                    Editar
                                </a>
                                <a href="<?php echo e(route('user.assign_role', $user->id)); ?>"
                                    class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded">
                                    Roles
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Julio\Downloads\TiendaRopa-main\TiendaRopa-main\resources\views/VistaUser/index.blade.php ENDPATH**/ ?>