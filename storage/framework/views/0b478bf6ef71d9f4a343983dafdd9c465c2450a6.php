<?php $__env->startSection('content-title'); ?> Liste des Formulaires <?php $__env->stopSection(); ?>
<?php $__env->startSection('pagination'); ?>
<!-- Pagination Bootstrap -->
<?php echo e($formsList->links()); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<?php if(session()->has('message')): ?>
	<div class="alert alert-success close-message">
		<?php echo e(session()->get('message')); ?>

	</div>
<?php endif; ?>
<script>
setTimeout(function () {
    $(".close-message").hide();
}, 4000)
</script>

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
		<div class="item-status">
			<span class="status-number" id="total_records">0</span>
			<span class="status-type">Recherche correspondante</span>
		</div>
	</div>

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

<div class="project-boxes jsGridView recherche-ajax">

	<?php if(auth()->guard()->check()): ?>
	
	<div class="project-box-wrapper">
	<a href="<?php echo e(route('forms.create')); ?>" id="addform">
		<div class="project-box border-fade" style="background-color: #1f1c2e;">
			<div class="project-box-header">
				<span> <?php echo e(Auth::user()->firstname); ?>

				<div class="badge" id="role" style="background-color: <?php echo e(Auth::user()->role->role_couleur); ?>;"> <?php echo e(Auth::user()->role->role_nom); ?> </div>
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

<svg version="1.1" id="crown" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 511.993 511.993" style="enable-background:new 0 0 511.993 511.993;" xml:space="preserve">
<polygon style="fill:#FFD782;" points="70.521,313.224 70.521,391.149 256,411.879 441.479,391.149 441.479,313.224 256,292.495 "></polygon>
<circle style="fill:#FF6465;" cx="139.621" cy="352.19" r="13.594"></circle>
<polygon style="opacity:0.1;enable-background:new    ;" points="131.47,391.149 131.47,313.224 286.474,295.901 256,292.495 
	70.521,313.224 70.521,391.149 256,411.879 286.474,408.473 "></polygon>
<g>
	<circle style="fill:#FF6465;" cx="255.996" cy="352.19" r="13.594"></circle>
	<circle style="fill:#FF6465;" cx="372.384" cy="352.19" r="13.594"></circle>
</g>
<path style="fill:#FFD782;" d="M441.479,292.495l50.693-150.076l-10.654-11.414c0,0-131.556,159.811-215.767-15.981h-19.504
	c-84.209,175.792-215.767,15.981-215.767,15.981l-10.654,11.414l50.693,150.076H441.479z"></path>
<g style="opacity:0.1;">
	<path d="M30.483,131.004l-10.654,11.416l50.693,150.076h60.949l-36.928-109.32C57.337,163.622,30.483,131.004,30.483,131.004z"></path>
</g>
<g>
	<circle style="fill:#E6B95C;" cx="255.996" cy="106.225" r="26.842"></circle>
	<circle style="fill:#E6B95C;" cx="26.842" cy="137.382" r="26.842"></circle>
	<circle style="fill:#E6B95C;" cx="485.151" cy="137.382" r="26.842"></circle>
</g>
<ellipse style="fill:#FF6465;" cx="255.996" cy="208.717" rx="22.568" ry="33.217"></ellipse>
<path style="fill:#E6B95C;" d="M441.479,271.766H70.521c-11.449,0-20.73,9.281-20.73,20.73l0,0c0,11.449,9.281,20.73,20.73,20.73
	h370.958c11.449,0,20.73-9.281,20.73-20.73l0,0C462.209,281.046,452.927,271.766,441.479,271.766z"></path>
<path style="opacity:0.1;enable-background:new    ;" d="M110.74,292.495L110.74,292.495c0-11.449,9.281-20.73,20.73-20.73H70.521
	c-11.449,0-20.73,9.281-20.73,20.73l0,0c0,11.449,9.281,20.73,20.73,20.73h60.949C120.021,313.224,110.74,303.944,110.74,292.495z"></path>
<path style="fill:#E6B95C;" d="M441.479,391.149H70.521c-11.449,0-20.73,9.281-20.73,20.73l0,0c0,11.449,9.281,20.73,20.73,20.73
	h370.958c11.449,0,20.73-9.281,20.73-20.73l0,0C462.209,400.431,452.927,391.149,441.479,391.149z"></path>
<path style="opacity:0.1;enable-background:new    ;" d="M110.74,411.879L110.74,411.879c0-11.449,9.281-20.73,20.73-20.73H70.521
	c-11.449,0-20.73,9.281-20.73,20.73l0,0c0,11.449,9.281,20.73,20.73,20.73h60.949C120.021,432.609,110.74,423.328,110.74,411.879z"></path><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
</svg>

					<?php if(Auth::user()->profile_photo_path == NULL): ?>
					<img src="<?php echo e(asset(array_rand(['img/defaut1.png'=>0, 'img/defaut2.png'=>1], 1))); ?>" alt="participant" id="participant">
					<?php else: ?>
					<img src=" <?php echo e(Auth::user()->profile_photo_path); ?> " alt="participant" id="participant">
          			<?php endif; ?>
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
	<div class="project-box-wrapper curl-top-left">
		<div class="project-box" style="background-color: <?php echo e($forms->color); ?>8a;">
			<div class="project-box-header">
				<span><?php echo e($forms->user->firstname); ?>

				<div class="badge" id="role" style="background-color: <?php echo e($forms->user->role->role_couleur); ?> ;"> <?php echo e($forms->user->role->role_nom); ?> </div>
				</span>
				<div class="more-wrapper">
					<button class="project-btn-more">
          
            <!-- Right Side Of Navbar -->
<ul class="navbar navbar-nav ml-auto">
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

    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
      <a class="dropdown-item" href="<?php echo e(route('forms.show', $forms->id)); ?>" onmouseover="this.style.background='<?php echo e($forms->color); ?>5a';" onmouseout="this.style.background='';"> <i class="bi bi-eye"></i> Consulter </a>
    </ul>    
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

    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
      
      <a class="dropdown-item" href="<?php echo e(route('forms.show', $forms->id)); ?>" onmouseover="this.style.background='<?php echo e($forms->color); ?>5a';" onmouseout="this.style.background='';"> <i class="bi bi-eye"></i> Consulter </a>
	<?php if(Gate::allows('form-access', $forms)): ?>
      <a class="dropdown-item" href="<?php echo e(route('forms.edit', $forms->id)); ?>" onmouseover="this.style.background='<?php echo e($forms->color); ?>5a';" onmouseout="this.style.background='';"> <i class="bi bi-pen"></i> Editer </a>

      <a class="dropdown-item" href="#" onclick="event.preventDefault();
      document.getElementById('delete-form<?php echo e($forms->id); ?>').submit();" onmouseover="this.style.background='<?php echo e($forms->color); ?>5a';" onmouseout="this.style.background='';"> <i class="bi bi-trash"></i> Supprimer </a>

      <form id="delete-form<?php echo e($forms->id); ?>" action="<?php echo e(route('forms.destroy', $forms->id)); ?>" method="POST" class="d-none">
        <?php echo method_field('DELETE'); ?>
        <?php echo csrf_field(); ?>
      </form>
	<?php endif; ?>
    </ul>

    
  </li>
  <?php endif; ?>
</ul>
						
					</button>
				</div>
			</div>
			<div class="project-box-content-header">
				<p class="box-content-header"><?php echo e($forms->title); ?></p>
				<p class="box-content-subheader"><?php if(strlen($forms->description) > 20): ?>
			<?php echo e(substr($forms->description, 0, 20)); ?>...
			<?php else: ?>
			<?php echo e($forms->description); ?>

			<?php endif; ?></p>
			</div>
			<div class="box-progress-wrapper">
				<p class="box-progress-header">Progress</p>
				<div class="box-progress-bar">
					<span class="box-progress" style="width: <?php echo e($forms->progress); ?>%; background-color: <?php echo e($forms->color); ?>"></span>
				</div>
				<p class="box-progress-percentage"><?php echo e($forms->progress); ?>%</p>
			</div>
			<div class="project-box-footer">
				<div class="participants">

					<svg version="1.1" id="crown" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 511.993 511.993" style="enable-background:new 0 0 511.993 511.993;" xml:space="preserve">
<polygon style="fill:#FFD782;" points="70.521,313.224 70.521,391.149 256,411.879 441.479,391.149 441.479,313.224 256,292.495 "></polygon>
<circle style="fill:#FF6465;" cx="139.621" cy="352.19" r="13.594"></circle>
<polygon style="opacity:0.1;enable-background:new    ;" points="131.47,391.149 131.47,313.224 286.474,295.901 256,292.495 
	70.521,313.224 70.521,391.149 256,411.879 286.474,408.473 "></polygon>
<g>
	<circle style="fill:#FF6465;" cx="255.996" cy="352.19" r="13.594"></circle>
	<circle style="fill:#FF6465;" cx="372.384" cy="352.19" r="13.594"></circle>
</g>
<path style="fill:#FFD782;" d="M441.479,292.495l50.693-150.076l-10.654-11.414c0,0-131.556,159.811-215.767-15.981h-19.504
	c-84.209,175.792-215.767,15.981-215.767,15.981l-10.654,11.414l50.693,150.076H441.479z"></path>
<g style="opacity:0.1;">
	<path d="M30.483,131.004l-10.654,11.416l50.693,150.076h60.949l-36.928-109.32C57.337,163.622,30.483,131.004,30.483,131.004z"></path>
</g>
<g>
	<circle style="fill:#E6B95C;" cx="255.996" cy="106.225" r="26.842"></circle>
	<circle style="fill:#E6B95C;" cx="26.842" cy="137.382" r="26.842"></circle>
	<circle style="fill:#E6B95C;" cx="485.151" cy="137.382" r="26.842"></circle>
</g>
<ellipse style="fill:#FF6465;" cx="255.996" cy="208.717" rx="22.568" ry="33.217"></ellipse>
<path style="fill:#E6B95C;" d="M441.479,271.766H70.521c-11.449,0-20.73,9.281-20.73,20.73l0,0c0,11.449,9.281,20.73,20.73,20.73
	h370.958c11.449,0,20.73-9.281,20.73-20.73l0,0C462.209,281.046,452.927,271.766,441.479,271.766z"></path>
<path style="opacity:0.1;enable-background:new    ;" d="M110.74,292.495L110.74,292.495c0-11.449,9.281-20.73,20.73-20.73H70.521
	c-11.449,0-20.73,9.281-20.73,20.73l0,0c0,11.449,9.281,20.73,20.73,20.73h60.949C120.021,313.224,110.74,303.944,110.74,292.495z"></path>
<path style="fill:#E6B95C;" d="M441.479,391.149H70.521c-11.449,0-20.73,9.281-20.73,20.73l0,0c0,11.449,9.281,20.73,20.73,20.73
	h370.958c11.449,0,20.73-9.281,20.73-20.73l0,0C462.209,400.431,452.927,391.149,441.479,391.149z"></path>
<path style="opacity:0.1;enable-background:new    ;" d="M110.74,411.879L110.74,411.879c0-11.449,9.281-20.73,20.73-20.73H70.521
	c-11.449,0-20.73,9.281-20.73,20.73l0,0c0,11.449,9.281,20.73,20.73,20.73h60.949C120.021,432.609,110.74,423.328,110.74,411.879z"></path><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
</svg>

					<?php if($forms->user->profile_photo_path == NULL): ?>
					<img src="<?php echo e(asset(array_rand(['img/defaut1.png'=>0, 'img/defaut2.png'=>1], 1))); ?>" alt="participant" id="participant">
					<?php else: ?>
					<img src=" <?php echo e($forms->user->profile_photo_path); ?> " alt="participant" id="participant">
          			<?php endif; ?>

					<img src="https://images.unsplash.com/photo-1503023345310-bd7c1de61c7d?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MTB8fG1hbnxlbnwwfHwwfA%3D%3D&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=900&amp;q=60" alt="participant" id="participant">
					<button class="add-participant" style="color: <?php echo e($forms->color); ?>;">
						<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
							<path d="M12 5v14M5 12h14"></path>
						</svg>
					</button>
				</div>
				<div class="days-left" style="color: <?php echo e($forms->color); ?>;">
					<?php echo e(strftime('%d/%m/%Y', strtotime($forms->date))); ?>

				</div>
			</div>
		</div>
	</div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/haya0002/public_html/V8Form/resources/views/forms/list.blade.php ENDPATH**/ ?>