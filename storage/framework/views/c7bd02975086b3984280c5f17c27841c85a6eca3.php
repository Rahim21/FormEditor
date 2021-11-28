<?php $__env->startSection('content'); ?>

<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>

<main class="admin-create">
    
            <div class="mb-8">
                <a href="<?php echo e(route('admin')); ?>" class="bg-darky hover:bg-darky text-white font-bold py-2 px-4 rounded text-decoration-none">Retour à la liste d'utilisateur</a>
            </div>
            <div class="content-admin content-taille mon-shadow">
                <form method="POST" action="<?php echo e(url('admin', $users->id)); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                        <div class="form-floating mb-2">
                            <input type="text" name="lastname" id="lastname" value="<?php echo e(old('lastname', $users->lastname)); ?>" class="form-control" id="floatLastname" placeholder="Lastname">
                            <label   for="floatLastname">Nom</label>
                        </div>
                        <?php $__errorArgs = ['lastname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-sm text-red-600"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>


                        <div class="form-floating mb-2">
                            <input type="text" name="firstname" id="firstname" value="<?php echo e(old('firstname', $users->firstname)); ?>" class="form-control" id="floatFirstname" placeholder="Firstname">
                            <label   for="floatFirstname">Prénom</label>
                        </div>
                        <?php $__errorArgs = ['firstname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-sm text-red-600"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>


                        <div class="form-floating mb-2">
                            <input type="email" name="email" id="email" value="<?php echo e(old('email', $users->email)); ?>" class="form-control" id="floatEmail" placeholder="Email">
                            <label   for="floatEmail">Email</label>
                        </div>
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-sm text-red-600"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                        <div class="form-floating">
                            <select name="role_id" class="form-select input-field mon-shadow" id="floatingSelect" aria-label="Floating label select example">
                            <option selected hidden value="<?php echo e(old('role_id', $users->role_id)); ?>"><?php echo e(old('role_nom', $users->role->role_nom)); ?></option>
                            <?php if(Auth::user()->role_id==1): ?>
                                <option value=<?php echo e(DB::table('roles')->where('role_nom', 'Modérateur')->value('id')); ?>>Modérateur</option>
                            <?php endif; ?>
                            <option value=<?php echo e(DB::table('roles')->where('role_nom', 'Etudiant')->value('id')); ?>>Etudiant</option>
                            <option value=<?php echo e(DB::table('roles')->where('role_nom', 'Professionnel')->value('id')); ?>>Professionnel</option>
                            <option value=<?php echo e(DB::table('roles')->where('role_nom', 'Particulier')->value('id')); ?>>Particulier</option>
                            </select>
                            <label for="role_id">Role</label>
                        </div>
                        <?php $__errorArgs = ['role_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-sm text-red-600"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                Editer
                            </button>
                        </div>
                </form>
            </div>
        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/haya0002/public_html/V5Form/resources/views/admin/edit.blade.php ENDPATH**/ ?>