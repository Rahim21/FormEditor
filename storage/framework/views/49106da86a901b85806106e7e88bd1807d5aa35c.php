<?php $__env->startSection('mode'); ?> sign-up-mode <?php $__env->stopSection(); ?>

<?php $__env->startSection('error'); ?>
    <?php if($errors->any()): ?>
        <!-- ErrorMessageBanner -->
        <div class="alert showAlert">
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

<?php $__env->startSection('content'); ?>
<!-- S'inscrire -->
<form method="POST" action="<?php echo e(route('register')); ?>" class="sign-up-form">
<?php echo csrf_field(); ?>
    <div class="centred">
    <img class="left-flex" src=" <?php echo e(asset('img/FormEditor.png')); ?> " style="width: 50px"/>
    <h2 class="title">S'inscrire</h2>
    </div>

    

    <div class="input-field mon-shadow">
        <i class="fas fa-user"></i>
        <input id="lastname" type="text" class="form-control <?php $__errorArgs = ['lastname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="lastname" value="<?php echo e(old('lastname')); ?>" required autocomplete="lastname" placeholder="Nom" autofocus/>

    </div>
    
    <div class="input-field mon-shadow">
        <i class="fas fa-user"></i>
        <input id="firstname" type="text" class="form-control <?php $__errorArgs = ['firstname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="firstname" value="<?php echo e(old('firstname')); ?>" required autocomplete="firstname" placeholder="Prénom"/>

    </div>

    <div class="input-field mon-shadow">
        <i class="fas fa-envelope"></i>
        <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" placeholder="Email"/>

    </div>
    
    <div class="input-field mon-shadow">
        <i class="fas fa-lock"></i>
        <input id="password-field" id="password" type="password" class="input" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="new-password" placeholder="Mot de passe"/>

        <div class="icon-wrapper">
            <span toggle="#password-field" class="ion ion-eye field-icon toggle-password"></span>
        </div>

        <div class="strength-lines">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </div>
    
    <div class="input-field mon-shadow">
        <i class="fas fa-lock"></i>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmer votre Mot de Passe"/>
    </div>

    <div class="centred" style="align-items: center;">
        <label for="role_confirm" class="left-flex"><?php echo e(__('Votre Statut : ')); ?></label>
        <div class="col-md-6">
            <select class="input-field mon-shadow" name="role_confirm">
                <option value=<?php echo e(DB::table('roles')->where('role_nom', 'Etudiant')->value('id')); ?>>Etudiant</option>
                <option value=<?php echo e(DB::table('roles')->where('role_nom', 'Professionnel')->value('id')); ?>>Professionnel</option>
                <option value=<?php echo e(DB::table('roles')->where('role_nom', 'Particulier')->value('id')); ?>>Particulier</option>
            </select>
        </div>
    </div>
    
    <div class="form-group row mb-0">
        <div class="col-md-8 offset-md-4">
            <button type="submit" class="btn solid btn_alert">
                <?php echo e(__("S'inscrire")); ?>

            </button>

        </div>
    </div>

    <?php if(Route::has('password.request')): ?>
                <a class="social-text" href="<?php echo e(route('password.request')); ?>">
                    <?php echo e(__('Mot de passe oublié ?')); ?>

                </a>
    <?php endif; ?>

  </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/haya0002/public_html/V6Form/resources/views/auth/register.blade.php ENDPATH**/ ?>