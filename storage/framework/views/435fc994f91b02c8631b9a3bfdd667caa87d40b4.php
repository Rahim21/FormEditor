<?php $__env->startSection('main'); ?> groupe-section mon-shadow <?php $__env->stopSection(); ?>
<?php $__env->startSection('groupeCSS'); ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.1.1/tailwind.min.css" rel="stylesheet">
<link href="<?php echo e(asset('css/groupe.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('ShowMessage'); ?>
<?php if(session()->has('message')): ?>
        <div class="alert showAlert close-message">
            <span class="fas fa-exclamation-circle"></span>
            <span class="msg">
                <?php echo e(session()->get('message')); ?>

            </span>
            <div class="close-btn">
                <span class="fas fa-times"></span>
            </div>
        </div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('error'); ?>
    <?php if($errors->any()): ?>
        <!-- ErrorMessageBanner -->
        <div class="alert showAlert close-message">
            <span class="fas fa-exclamation-circle"></span>
            <span class="msg">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
            </span>
            <div class="close-btn">
                <span class="fas fa-times"></span>
            </div>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('GroupeInfo'); ?>

<!-- Formulaire et Groupe : -->
    <div class="bg-white border border-gray-200 w-full p-4 mb-4">
                <form method="POST" action="<?php echo e(route('groupes.addMember', $forms->id)); ?>">
                    <?php echo csrf_field(); ?>

                        <div class="form-floating mb-2">
                            <input type="text" name="membreEmail" id="membreEmail" value="" class="form-control" id="floatMembreEmail" placeholder="exemple@formeditor.com">
                            <label   for="floatMembreEmail">Entrez le mail du membre</label>
                        </div>
                        <?php $__errorArgs = ['membreEmail'];
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
                            <a href="<?php echo e(URL::previous()); ?>" class="bg-red-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                Annuler
                            </a>
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                Ajouter
                            </button>
                        </div>
                </form>

    </div>
      
<?php $__env->stopSection(); ?>
<?php echo $__env->make('groupes.list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/haya0002/public_html/V9Form/resources/views/groupes/create.blade.php ENDPATH**/ ?>