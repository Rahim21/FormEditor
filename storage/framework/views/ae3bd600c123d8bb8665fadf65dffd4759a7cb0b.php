<?php $__env->startSection('main'); ?> groupe-section mon-shadow <?php $__env->stopSection(); ?>
<?php $__env->startSection('groupeCSS'); ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.1.1/tailwind.min.css" rel="stylesheet">
<link href="<?php echo e(asset('css/groupe.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

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

    
<div class="bg-gray-100 dark:bg-gray-900 dark:text-white text-gray-600 h-screen flex overflow-hidden text-sm">
  
  <div class="flex-grow overflow-hidden h-full flex flex-col">
    
    <div class="flex-grow flex overflow-x-hidden">
      <div class="xl:w-72 w-48 flex-shrink-0 border-r border-gray-200 dark:border-gray-800 h-full overflow-y-auto lg:block hidden groupe-left">
        <div class="text-xs text-gray-400 tracking-wider">Groupe :</div>
        <div class="relative mt-2">
          <input type="text" class="pl-8 h-9 bg-transparent border border-gray-300 dark:border-gray-700 dark:text-white w-full rounded-md text-sm" placeholder="Search">
          <svg viewBox="0 0 24 24" class="w-4 absolute text-gray-400 top-1/2 transform translate-x-0.5 -translate-y-1/2 left-2" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="11" cy="11" r="8"></circle>
            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
          </svg>
        </div>
        <div class="space-y-4 mt-3">
          
	        <?php $__currentLoopData = $formsList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $forms): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <button class="bg-white p-3 w-full flex flex-col rounded-md dark:bg-gray-800 shadow">
            <div class="flex xl:flex-row flex-col items-center font-medium text-gray-900 dark:text-white pb-2 mb-2 xl:border-b border-gray-200 border-opacity-75 dark:border-gray-700 w-full">
              <img src=" <?php echo e("img/defaut1.png"); ?> " class="w-7 h-7 mr-2 rounded-full" alt="profile">
              <?php echo e($forms->title); ?>

            </div>
            <div class="flex items-center w-full">
              <div class="text-xs py-1 px-2 leading-none dark:bg-gray-900 bg-blue-100 text-blue-500 rounded-md"> 
                
                

<?php $__currentLoopData = $forms->usersGroupe; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <?php if($loop->first): ?>
    <b>membres : </b>
  <?php endif; ?>
  <?php echo e($user->firstname); ?>

  <?php if(!$loop->last): ?>
    ;
  <?php else: ?>
    <br/>
  <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


               </div> <!-- count nbr membre -->
              <div class="ml-auto text-xs text-gray-500"> <?php echo e($forms->date); ?> </div>
            </div>
          </button>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
      <div class="flex-grow bg-white dark:bg-gray-900 overflow-y-auto">

        <div class="sm:px-7 sm:pt-7 px-4 pt-4 flex flex-col w-full border-b border-gray-200 bg-white dark:bg-gray-900 dark:text-white dark:border-gray-800 sticky top-0">
          <div class="flex w-full items-center">
            <div class="flex items-center text-3xl text-gray-900 dark:text-white mb-4">
              <span>Gestion de vos Groupes</span>
            </div>
            <div class="ml-auto sm:flex hidden items-center justify-end">
              <div class="text-right">
                <div class="text-gray-900 text-lg dark:text-white">Admin > Groupe</div>
              </div>
              <button class="w-8 h-8 ml-4 text-gray-400 shadow dark:text-gray-400 rounded-full flex items-center justify-center border border-gray-200 dark:border-gray-700">
                <svg viewBox="0 0 24 24" class="w-4" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <circle cx="12" cy="12" r="1"></circle>
                  <circle cx="19" cy="12" r="1"></circle>
                  <circle cx="5" cy="12" r="1"></circle>
                </svg>
              </button>
            </div>
          </div>

        </div>
        <div class="sm:p-7 p-4">

            <!-- Formulaire et Groupe : -->
  <div class="bg-white border border-gray-200 w-full p-4 mb-4">
    <div class="mb-4 GroupeInfo">
        <div class="GroupeInfo-left">
      <img style="border-radius: 20px;" src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixqx=ITpzis0SHv&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80">
        </div>
        <div class="GroupeInfo-right">
      <h3 class="font-medium text-xl sm:text-2xl">Scalable customer service</h3>
        <p class="mt-2 text-gray-500 text-sm sm:text-base">An all-in-one customer service platform that helps you balance everything your customers need to be happy.</p>
     </div>
    </div>
    
    <div class="text-gray-500 mt-2 text-sm sm:text-base">
      Membre(s) du groupe :
    </div>
    
    <div class="mt-2 flex items-center justify-between flex-wrap w-full">
      <div>
        <div class="flex -space-x-2 overflow-hidden">
  <img class="inline-block h-10 w-10 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixqx=ITpzis0SHv&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
  <img class="inline-block h-10 w-10 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
  <img class="inline-block h-10 w-10 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&ixqx=ITpzis0SHv&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.25&w=256&h=256&q=80" alt="">
  <img class="inline-block h-10 w-10 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixqx=ITpzis0SHv&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
</div>
      </div>
      <div class="sm:mt-0 mt-4 w-full sm:w-auto">
        <button class="px-6 py-2 bg-green-500 text-white rounded w-full sm:w-auto">Ajouter un Membre</button>
        <button class="px-6 py-2 bg-indigo-500 text-white rounded w-full sm:w-auto">Editer Groupe</button>
        <button class="px-6 py-2 bg-red-500 text-white rounded w-full sm:w-auto">Supprimer Groupe</button>
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
              <tr>
                <td class="sm:p-3 py-2 px-1 border-b border-gray-200 dark:border-gray-800 px-6 text-sm profile">
                  
                  <img src=" https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixqx=ITpzis0SHv&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80 ">
                </td>
                <td class="sm:p-3 py-2 px-3 border-b border-gray-200 dark:border-gray-800">
                  <div class="flex items-center">
                    Nom
                  </div>
                </td>
                <td class="sm:p-3 py-2 px-3 border-b border-gray-200 dark:border-gray-800">
                  <div class="flex items-center">
                    Prénom
                  </div>
                </td>
                <td class="sm:p-3 py-2 px-3 border-b border-gray-200 dark:border-gray-800 md:table-cell hidden">
                  <div class="flex items-center">
                    email@formeditor.com
                  </div>
                </td>
                <td class="sm:p-3 py-2 px-3 border-b border-gray-200 dark:border-gray-800 md:table-cell hidden">
                  <div class="flex items-center">
                    Role...
                  </div>
                </td>
                <td class="sm:p-3 py-2 px-5 border-b border-gray-200 dark:border-gray-800 text-red-500">
                  <form id="delete-user '$user->id' " class="inline-block" action=" ' route('admin.destroy', $user->id) ' " method="POST" onsubmit="return confirm('Etes-vous sûr de vouloir supprimer cette utilisateur ?');">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                    <button type="submit" id="red" class="btn btn-sm btn-outline-danger mb-1 button-glow" value="Delete">Retirer membre du groupe</button>
                  </form>
                </td>
              </tr>
              <tr>
                <td class="sm:p-3 py-2 px-1 border-b border-gray-200 dark:border-gray-800 px-6 text-sm profile">
                  
                  <img src=" https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixqx=ITpzis0SHv&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80 ">
                </td>
                <td class="sm:p-3 py-2 px-3 border-b border-gray-200 dark:border-gray-800">
                  <div class="flex items-center">
                    Nom
                  </div>
                </td>
                <td class="sm:p-3 py-2 px-3 border-b border-gray-200 dark:border-gray-800">
                  <div class="flex items-center">
                    Prénom
                  </div>
                </td>
                <td class="sm:p-3 py-2 px-3 border-b border-gray-200 dark:border-gray-800 md:table-cell hidden">
                  <div class="flex items-center">
                    email@formeditor.com
                  </div>
                </td>
                <td class="sm:p-3 py-2 px-3 border-b border-gray-200 dark:border-gray-800 md:table-cell hidden">
                  <div class="flex items-center">
                    Role...
                  </div>
                </td>
                <td class="sm:p-3 py-2 px-5 border-b border-gray-200 dark:border-gray-800 text-red-500">
                  <form id="delete-user '$user->id' " class="inline-block" action=" ' route('admin.destroy', $user->id) ' " method="POST" onsubmit="return confirm('Etes-vous sûr de vouloir supprimer cette utilisateur ?');">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                    <button type="submit" id="red" class="btn btn-sm btn-outline-danger mb-1 button-glow" value="Delete">Retirer membre du groupe</button>
                  </form>
                </td>
              </tr>
            </tbody>
          </table>
          
        </div>
      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.forms', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/haya0002/public_html/V8Form/resources/views/groupes/list.blade.php ENDPATH**/ ?>