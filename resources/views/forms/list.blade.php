@extends('layouts.app')
@section('content-title') Liste des Formulaires @endsection
@section('content')

<div class="projects-section-line">
	<div class="projects-status">
		@auth
		<div class="item-status">
			<span class="status-number">{{ ($countUserForms) }}</span>
			<span class="status-type">Vos formulaires</span>
		</div>
		@endauth
		<div class="item-status">
			<span class="status-number">{{ ($countForms) }}</span>
			<span class="status-type">Total des formulaires</span>
		</div>
	</div>
	<!-- Pagination Bootstrap -->
	{{ $formsList->links() }}
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

	@auth
	{{-- Création d'un formulaire --}}
	<div class="project-box-wrapper">
	<a href="{{ route('forms.create') }}" id="addform">
		<div class="project-box" style="background-color: #1f1c2e;">
			<div class="project-box-header">
				<span> {{ Auth::user()->firstname }}
				<div class="badge" id="role" style="background-color: #73ff00;">Etudiant</div>
				</span>
			</div>
			<div class="project-box-content-header">
				<p class="box-content-header">{{ __('Nouveau Formulaire') }}</p>
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
					@if (Auth::user()->profile_photo_path == NULL)
					<img src="https://via.placeholder.com/600" alt="participant" id="participant">
					@else
					<img src=" {{ Auth::user()->profile_photo_path }} " alt="participant" id="participant">
          			@endif
				</div>
				<div class="days-left" style="color: #ffffff;">
					{{ __(' Maintenant ') }}
				</div>
			</div>
		</div>
	</a>
	</div>
	@endauth






	{{-- Liste des formulaires --}}
	@foreach($formsList as $forms)
	<div class="project-box-wrapper">
		<div class="project-box" style="background-color: #29b0ff8a;">
			<div class="project-box-header">
				<span>{{ $forms->user->firstname }}
				<div class="badge" id="role" style="background-color: #ff0000;">Etudiant</div>
				</span>
				<div class="more-wrapper">
					<button class="project-btn-more">
          
            <!-- Right Side Of Navbar -->
<ul class="navbar navbar-nav ml-auto">
  <!-- Authentication Links -->
  @guest
  <li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link text-reset" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical">
        <circle cx="12" cy="12" r="1"></circle>
        <circle cx="12" cy="5" r="1"></circle>
        <circle cx="12" cy="19" r="1"></circle>
      </svg>
    </a>

    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
      <a class="dropdown-item" href="{{ route('forms.show', $forms->id) }}"> <i class="bi bi-eye"></i> Consulter </a>
    </ul>    
  </li>
  @else
  <li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link text-reset" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical">
        <circle cx="12" cy="12" r="1"></circle>
        <circle cx="12" cy="5" r="1"></circle>
        <circle cx="12" cy="19" r="1"></circle>
      </svg>
    </a>

    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
      
      <a class="dropdown-item" href="{{ route('forms.show', $forms->id) }}"> <i class="bi bi-eye"></i> Consulter </a>

      <a class="dropdown-item" href="{{ route('forms.edit', $forms->id) }}"> <i class="bi bi-pen"></i> Editer </a>

      <a class="dropdown-item" href="#" onclick="event.preventDefault();
      document.getElementById('delete-form').submit();"> <i class="bi bi-trash"></i> Supprimer </a>

      <form id="delete-form" action="{{ route('forms.destroy', $forms->id) }}" method="POST" class="d-none">
        @method('DELETE')
        @csrf
      </form>
    </ul>

    
  </li>
  @endguest
</ul>
						
					</button>
				</div>
			</div>
			<div class="project-box-content-header">
				<p class="box-content-header">{{ $forms->title }}</p>
				<p class="box-content-subheader">@if(strlen($forms->message) > 20)
			{{ substr($forms->message, 0, 20) }}...
			@else
			{{ $forms->message }}
			@endif</p>
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
					@if ($forms->user->profile_photo_path == NULL)
					<img src="https://via.placeholder.com/600" alt="participant" id="participant">
					@else
					<img src=" {{ $forms->user->profile_photo_path }} " alt="participant" id="participant">
          			@endif

					<img src="https://images.unsplash.com/photo-1503023345310-bd7c1de61c7d?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MTB8fG1hbnxlbnwwfHwwfA%3D%3D&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=900&amp;q=60" alt="participant" id="participant">
					<button class="add-participant" style="color: #29b0ff;">
						<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
							<path d="M12 5v14M5 12h14"></path>
						</svg>
					</button>
				</div>
				<div class="days-left" style="color: #29b0ff;">
					{{ strftime('%d/%m/%Y', strtotime($forms->date)) }}
				</div>
			</div>
		</div>
	</div>
	@endforeach
</div>
<style>
	/* a.dropdown-item:hover{
		background-color: mettre un root puis laisser le choix au user dans le form pour la couleur;
	} */
</style>
@endsection