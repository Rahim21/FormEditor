<?php $__env->startSection('content-title'); ?> Liste des Formulaires <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="projects-section-line">
	<div class="projects-status">
		<?php if(auth()->guard()->check()): ?>
		<div class="item-status">
			<span class="status-number"><?php echo e(($countUserForms)); ?></span>
			<span class="status-type">Vos formulaires</span>
		</div>
		<?php endif; ?>
		<div class="item-status">
			<span class="status-number"><?php echo e(($countForms)); ?></span>
			<span class="status-type">Total des formulaires</span>
		</div>
	</div>
	<p>Pagination ...</p>
	<div class="view-actions">
		<button class="view-btn list-view" title="List View">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list">
				<line x1="8" y1="6" x2="21" y2="6"></line>
				<line x1="8" y1="12" x2="21" y2="12"></line>
				<line x1="8" y1="18" x2="21" y2="18"></line>
				<line x1="3" y1="6" x2="3.01" y2="6"></line>
				<line x1="3" y1="12" x2="3.01" y2="12"></line>
				<line x1="3" y1="18" x2="3.01" y2="18"></line>
			</svg>
		</button>
		<button class="view-btn grid-view active" title="Grid View">
			<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid">
				<rect x="3" y="3" width="7" height="7"></rect>
				<rect x="14" y="3" width="7" height="7"></rect>
				<rect x="14" y="14" width="7" height="7"></rect>
				<rect x="3" y="14" width="7" height="7"></rect>
			</svg>
		</button>
	</div>
</div>

<div class="project-boxes jsGridView">

	<?php if(auth()->guard()->check()): ?>
	
	<div class="project-box-wrapper">
	<a href="<?php echo e(route('forms.create')); ?>" id="addform">
		<div class="project-box" style="background-color: #1f1c2e;">
			<div class="project-box-header">
				<span> <?php echo e(Auth::user()->firstname); ?>

				<div class="badge" id="role" style="background-color: #73ff00;">Etudiant</div>
				</span>
			</div>
			<div class="project-box-content-header">
				<p class="box-content-header"><?php echo e(__('Nouveau Formulaire')); ?></p>
				<p class="box-content-subheader">Cliquez-ici</p>
			</div>
			<div class="box-progress-wrapper">
				<p class="box-progress-header"></p>
				<div class="d-flex justify-content-center">
					<svg id="resize" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="50px" height="50px" viewBox="15 15 20 20" enable-background="new 0 0 50 50" xml:space="preserve">
						<path fill="#FFF" d="M 35, 27 H 27 V 35 h -4 v -8 h -8 V 23 h 8 v -8 H 27 v 8 h 8 V 27 z" />
					</svg>
				</div>
				<p></p>
			</div>
			<div class="project-box-footer" style="color: whitesmoke">
				<div class="participants">
					<img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=2550&amp;q=80" alt="participant">
				</div>
				<div class="days-left" style="color: #ffffff;">
					<?php echo e(__(' Maintenant ')); ?>

				</div>
			</div>
		</div>
	</a>
	</div>
	<?php endif; ?>






	
	<?php $__currentLoopData = $formsList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $forms): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<div class="project-box-wrapper">
		<div class="project-box" style="background-color: #cbebfe;">
			<div class="project-box-header">
				<span><?php echo e($forms->user->firstname); ?>

				<div class="badge" id="role" style="background-color: #ff0000;">Etudiant</div>
				</span>
				<div class="more-wrapper">
					<button class="project-btn-more">
          
            <!-- Right Side Of Navbar -->
<ul class="navbar-nav ml-auto">
  <!-- Authentication Links -->
  <?php if(auth()->guard()->guest()): ?>
  <li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link text-reset" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical">
        <circle cx="12" cy="12" r="1"></circle>
        <circle cx="12" cy="5" r="1"></circle>
        <circle cx="12" cy="19" r="1"></circle>
      </svg>
    </a>

    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
      <a class="dropdown-item" href="<?php echo e(route('forms.show', $forms->id)); ?>"> Consulter </a>
    </div>    
  </li>
  <?php else: ?>
  <li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link text-reset" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical">
        <circle cx="12" cy="12" r="1"></circle>
        <circle cx="12" cy="5" r="1"></circle>
        <circle cx="12" cy="19" r="1"></circle>
      </svg>
    </a>

    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
      
      <a class="dropdown-item" href="<?php echo e(route('forms.show', $forms->id)); ?>"> Consulter </a>

      <a class="dropdown-item" href="<?php echo e(route('forms.edit', $forms->id)); ?>"> Editer </a>

      <a class="dropdown-item" href="#" onclick="event.preventDefault();
      document.getElementById('delete-form').submit();"> Supprimer </a>

      <form id="delete-form" action="<?php echo e(route('forms.destroy', $forms->id)); ?>" method="POST" class="d-none">
        <?php echo method_field('DELETE'); ?>
        <?php echo csrf_field(); ?>
      </form>
    </div>

    
  </li>
  <?php endif; ?>
</ul>
						
					</button>
				</div>
			</div>
			<div class="project-box-content-header">
				<p class="box-content-header"><?php echo e($forms->title); ?></p>
				<p class="box-content-subheader"><?php if(strlen($forms->message) > 20): ?>
			<?php echo e(substr($forms->message, 0, 20)); ?>...
			<?php else: ?>
			<?php echo e($forms->message); ?>

			<?php endif; ?></p>
			</div>
			<div class="box-progress-wrapper">
				<p class="box-progress-header">Progress</p>
				<div class="box-progress-bar">
					<span class="box-progress" style="width: 60%; background-color: #29b0ff"></span>
				</div>
				<p class="box-progress-percentage">60%</p>
			</div>
			<div class="project-box-footer">
				<div class="participants">
					<img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=2550&amp;q=80" alt="participant">
					<img src="https://images.unsplash.com/photo-1503023345310-bd7c1de61c7d?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MTB8fG1hbnxlbnwwfHwwfA%3D%3D&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=900&amp;q=60" alt="participant">
					<button class="add-participant" style="color: #29b0ff;">
						<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
							<path d="M12 5v14M5 12h14"></path>
						</svg>
					</button>
				</div>
				<div class="days-left" style="color: #29b0ff;">
					<?php echo e(strftime('%d/%m/%Y', strtotime($forms->date))); ?>

				</div>
			</div>
		</div>
	</div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/haya0002/public_html/FormEditor/resources/views/forms/list.blade.php ENDPATH**/ ?>