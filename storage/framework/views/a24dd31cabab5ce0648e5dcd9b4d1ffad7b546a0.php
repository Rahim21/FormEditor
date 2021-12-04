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

    <div class="formDetail">
        <input type="text" class="input-field mon-shadow <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="title" id="title" placeholder="Titre" value="<?php echo e(old('title')); ?>"/>

        <textarea class="input-field mon-shadow <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="message" name="message" rows="2" placeholder="Description"><?php echo e(old('message')); ?></textarea>

        <input type="datetime-local" class="input-field mon-shadow <?php $__errorArgs = ['date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="date" id="date" placeholder="Date" value="<?php echo e(old('date')); ?>"/>
        
        <div class="input-field mon-shadow">
        <label for="exampleColorInput" class="">Couleur du formulaire</label>
        <input type="color" name="color" class="" id="exampleColorInput" value="#06ea3f" title="Veuillez choisir une couleur">
        </div>
    </div>

    <div class="formBuilder">
        <div class="box-left">
            <div data-tpl="header1" data-title="Header 1">
                Label
            </div>
            <div data-tpl="header2" data-title="Header 2">
                Input
            </div>
            <div data-tpl="header3" data-title="Header 3">
                Text Area
            </div>
            <div data-tpl="shortparagraph" data-title="Short paragraph">
                Select Box
            </div>
            <div data-tpl="image">
                Select Image
            </div>
        </div>
        <div class="box-right">
            <div class="right"><span style="color: #fff">Double-click : Supprimer un champs</span></div>
            <form id="form-builder" method="post" action="<?php echo e(route('submit')); ?>" enctype='multipart/form-data'>
                <?php echo csrf_field(); ?>

                <?php if(session()->has('message')): ?>
                    <div class="alert alert-success close-message">
                        <?php echo e(session()->get('message')); ?>

                    </div>
                <?php endif; ?>

                <input type="hidden" id="form-data" name="formulaire" value="">
                <div class="box-rightsave <?php $__errorArgs = ['formulaire'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="contents-2" style="min-height: 150px" name="formulaire" id="formulaire">
                <?php echo e(old('formulaire')); ?>

                </div>
            </form>
        </div>
    </div>
    <div class="options bg-center" style="float: right">
        <button class="cancel btn-danger"><a class="cancel2" href="<?php echo e(url('forms')); ?>"> Annuler </a></button>
        <button class="reset">Reset</button>
        <button class="save">Download PDF</button>
        <button class="form-submit">Enregistrer</button>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.forms', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/haya0002/public_html/V6Form/resources/views/forms/create.blade.php ENDPATH**/ ?>