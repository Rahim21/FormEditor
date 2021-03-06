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
<!-- Se connecter -->
<form method="POST" action="<?php echo e(route('login')); ?>" class="sign-in-form">
<?php echo csrf_field(); ?>
    <div class="centred">
        <img class="left-flex" src=" <?php echo e(asset('img/FormEditor.png')); ?> " style="width: 50px"/>
        <h2 class="title">Se connecter</h2>
    </div>

    <div class="input-field mon-shadow">
      <i class="fas fa-user"></i>
      <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" placeholder="Email" autofocus>

    </div>

    <div class="input-field mon-shadow">
      <i class="fas fa-lock"></i>
      <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password" placeholder="Mot de passe"/>

    </div>

    <div class="form-group row">
        <input class="form-check-input" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>

        <label class="form-check-label" for="remember">
            <?php echo e(__('Se souvenir de moi')); ?>

        </label>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-8 offset-md-4">
            <button type="submit" class="btn solid btn_alert">
                <?php echo e(__("Se connecter")); ?>

            </button>

        </div>
    </div>

    <?php if(Route::has('password.request')): ?>
                <a class="social-text" href="<?php echo e(route('password.request')); ?>">
                    <?php echo e(__('Mot de passe oubli?? ?')); ?>

                </a>
    <?php endif; ?>
    
  </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/haya0002/public_html/V8Form/resources/views/auth/login.blade.php ENDPATH**/ ?>