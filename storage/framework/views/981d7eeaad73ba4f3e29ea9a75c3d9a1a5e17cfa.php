<?php $__env->startSection('content'); ?>
<main>
                <div>
        <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mb-8">
                <a href="<?php echo e(route('admin.create')); ?>" class="bg-darky hover:bg-darky text-white font-bold py-2 px-4 rounded text-decoration-none">Créer un utilisateur</a>
            </div>
                        <div class="content-admin mon-shadow tableWrap">
                            <table class="divide-y divide-gray-200">
                                <thead>
                                <tr>
                                    <th scope="col" width="50" class="uppercase text-gray-500 px-6 text-xs bg-gray-50">
                                        ID
                                    </th>
                                    <th scope="col" width="50" class="uppercase text-gray-500 px-6 text-xs bg-gray-50">
                                        Profile
                                    </th>
                                    <th scope="col" class="uppercase text-gray-500 px-6 text-xs bg-gray-50">
                                        Lastame
                                    </th>
                                    <th scope="col" class="uppercase text-gray-500 px-6 text-xs bg-gray-50">
                                        Firstame
                                    </th>
                                    <th scope="col" class="uppercase text-gray-500 px-6 text-xs bg-gray-50">
                                        Email
                                    </th>
                                    <th scope="col" class="uppercase text-gray-500 px-6 text-xs bg-gray-50">
                                        Role
                                    </th>
                                    <th scope="col" width="200" class="px-6 py-3 bg-gray-50">

                                    </th>
                                </tr>
                                </thead>
                                <tbody class="divide-y bg-white">
                                <?php $__currentLoopData = $usersList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="px-6 text-sm">
                                            <?php echo e($user->id); ?>

                                        </td>

                                        <td class="px-6 text-sm profile">
                                            <img src=" <?php echo e($user->profile_photo_path); ?> ">
                                        </td>

                                        <td class="px-6 text-sm">
                                            <?php echo e($user->lastname); ?>

                                        </td>

                                        <td class="px-6 text-sm">
                                            <?php echo e($user->firstname); ?>

                                        </td>

                                        <td class="px-6 text-sm">
                                            <?php echo e($user->email); ?>

                                        </td>

                                        <td class="px-6 text-sm">
                                            <div class="badge" id="role" style="background-color: <?php echo e($user->role->role_couleur); ?> ;"> <?php echo e($user->role->role_nom); ?> </div>
                                        </td>

                                        <td class="px-6 text-sm icon-flex">
                                            <a href="<?php echo e(route('admin.show', $user->id)); ?>" id="black" class="btn btn-sm btn-outline-dark mb-1 button-glow"><i class="bi-search"></i></a>
                                            <?php if(Gate::allows('user-access', $user->role_id)): ?>
                                                <a href="<?php echo e(route('admin.edit', $user->id)); ?>" id="blue" class="btn btn-sm btn-outline-primary mb-1 button-glow"><i class="bi-pencil"></i></a>
                                                <form id="delete-user<?php echo e($user->id); ?>" class="inline-block" action="<?php echo e(route('admin.destroy', $user->id)); ?>" method="POST" onsubmit="return confirm('Etes-vous sûr de vouloir supprimer cette utilisateur ?');">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                                    
                                                    <button type="submit" id="red" class="btn btn-sm btn-outline-danger mb-1 button-glow" value="Delete"><i class="bi-trash2"></i></button>
                                                </form>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>

        </div>
    </div>
            </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/haya0002/public_html/V6Form/resources/views/admin/list.blade.php ENDPATH**/ ?>