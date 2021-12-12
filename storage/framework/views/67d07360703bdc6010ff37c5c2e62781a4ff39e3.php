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
    <div class="mb-4 GroupeInfo">
        <div class="GroupeInfo-left">
      <img style="border-radius: 20px;" src="<?php echo e($groupe->logo); ?>">
        </div>
        <div class="GroupeInfo-right">
      <h3 class="font-medium text-xl sm:text-2xl"><?php echo e($groupe->title); ?></h3>
        <p class="mt-2 text-gray-500 text-sm sm:text-base"><?php echo e($groupe->description); ?></p>
     </div>
    </div>
    
    <div class="text-gray-500 mt-2 text-sm sm:text-base">
      Membre(s) du groupe :
    </div>
    
    <div class="mt-2 flex items-center justify-between flex-wrap w-full">
      <div>
        <div class="flex -space-x-2 overflow-hidden">
  <?php $compteurMembre=0; ?>
  <?php $__currentLoopData = $groupe->usersGroupe->sortBy('id'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <img class="inline-block h-10 w-10 rounded-full ring-2 ring-white" src="<?php echo e($member->profile_photo_path); ?>" alt="">
  <?php $compteurMembre++; ?>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
      </div>
      <div class="sm:mt-0 mt-4 w-full sm:w-auto">
        <?php if($compteurMembre<6): ?>
        <a class="px-6 py-2 bg-green-500 text-white rounded w-full sm:w-auto text-decoration-none" href="<?php echo e(route('groupes.create', $groupe->id)); ?>">Ajouter un Membre</a>
        <?php endif; ?>
        <a class="px-6 py-2 bg-indigo-500 text-white rounded w-full sm:w-auto text-decoration-none" href="<?php echo e(route('groupes.edit', $groupe->id)); ?>">Editer Groupe</a>

        <form id="delete-form<?php echo e($groupe->id); ?>" action="<?php echo e(route('forms.destroy', $groupe->id)); ?>" method="POST" class="inline-block" onsubmit="return confirm('Etes-vous sûr de vouloir supprimer votre Groupe/Formulaire ?');">
        <?php echo method_field('DELETE'); ?>
        <?php echo csrf_field(); ?>
        <button class="px-6 py-2 bg-red-500 text-white rounded w-full sm:w-auto text-decoration-none" type="submit" value="Delete">Supprimer Groupe/Formulaire</button>
      </form>
      </div>
    </div>
  </div>

          <!-- Liste des membres :   -->
          <table class="w-full text-left">
            <thead>
              <tr class="text-gray-400">
                <th class="font-normal px-3 pt-0 pb-3 border-b border-gray-200 dark:border-gray-800"></th>
                <th class="font-normal px-3 pt-0 pb-3 border-b border-gray-200 dark:border-gray-800">Nom</th>
                <th class="font-normal px-3 pt-0 pb-3 border-b border-gray-200 dark:border-gray-800">Prénom</th>
                <th class="font-normal px-3 pt-0 pb-3 border-b border-gray-200 dark:border-gray-800 hidden md:table-cell">Email</th>
                <th class="font-normal px-3 pt-0 pb-3 border-b border-gray-200 dark:border-gray-800">Role</th>
                <th class="font-normal px-3 pt-0 pb-3 border-b border-gray-200 dark:border-gray-800"></th>
              </tr>
            </thead>
            <tbody class="text-gray-600 dark:text-gray-100">
              <?php $__currentLoopData = $groupe->usersGroupe->sortBy('id'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($member->id != Auth::id()): ?>
              <tr>
                <td class="sm:p-3 py-2 px-1 border-b border-gray-200 dark:border-gray-800 px-6 text-sm profile">
                  
                  <img src=" <?php echo e($member->profile_photo_path); ?> ">
                </td>
                <td class="sm:p-3 py-2 px-3 border-b border-gray-200 dark:border-gray-800">
                  <div class="flex items-center">
                    <?php echo e($member->lastname); ?>

                  </div>
                </td>
                <td class="sm:p-3 py-2 px-3 border-b border-gray-200 dark:border-gray-800">
                  <div class="flex items-center">
                    <?php echo e($member->firstname); ?>

                  </div>
                </td>
                <td class="sm:p-3 py-2 px-3 border-b border-gray-200 dark:border-gray-800 md:table-cell hidden">
                  <div class="flex items-center">
                    <?php echo e($member->email); ?>

                  </div>
                </td>
                <td class="sm:p-3 py-2 px-3 border-b border-gray-200 dark:border-gray-800 md:table-cell hidden">
                  <div class="flex items-center">
                    <?php echo e($member->role->role_nom); ?>

                  </div>
                </td>
                <td class="sm:p-3 py-2 px-5 border-b border-gray-200 dark:border-gray-800 text-red-500">
                  <form id="delete-user<?php echo e($member->id); ?> " class="inline-block" action=" <?php echo e(route('groupes.destroy', $member->id)); ?> " method="POST" onsubmit="return confirm('Etes-vous sûr de vouloir retirer ce membre du groupe ?');">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                    <button type="submit" id="red" class="btn btn-sm btn-outline-danger mb-1 button-glow" value="Delete">Retirer du groupe</button>
                  </form>
                </td>
              </tr>
              <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('groupes.list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/haya0002/public_html/V9Form/resources/views/groupes/consult.blade.php ENDPATH**/ ?>