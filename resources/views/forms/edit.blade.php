@extends('layouts.admin')
@section('content')

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ url('forms', $forms->id) }}" method="POST">
  @csrf
  @method('PUT')

  <div class="mb-3 row">
    <label for="title" class="col-sm-2 col-form-label"> Titre </label>
    <div class="col-sm-10">
      <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Saisir le titre de l'actualité" value="{{ $forms->title }}"/>
    </div>
  </div>

  <div class="mb-3 row">
    <label for="message" class="col-sm-2 col-form-label"> Message </label>
    <div class="col-sm-10">
      <textarea class="form-control" id="message" name="message" rows="3" placeholder="Saisir le message de l'actualité">{{ $forms->message }}</textarea>
    </div>
  </div>

  <div class="mb-3 row">
    <label for="date" class="col-sm-2 col-form-label"> Date </label>
    <div class="col-sm-10">
      <input type="datetime-local" class="form-control" name="date" id="date" placeholder="Saisir la date de l'actualité" value="{{ date('Y-m-d\TH:i', strtotime($forms->date)) }}"/>
    </div>
  </div>

  <label for="exampleColorInput" class="form-label">Veuillez selectionner une couleur pour votre formulaire</label>
  <input type="color" name="color" class="form-control form-control-color" id="exampleColorInput" value="{{ $forms->color }}" title="Veuillez choisir une couleur">

  <div class="mb-3">
    <div class="offset-sm-2 col-sm-10">
      <button class="btn btn-primary mb-1 mr-1" type="submit"> Modifier </button>
      <a href="{{ route('forms.show', $forms->id) }}" class="btn btn-danger mb-1"> Annuler </a>
    </div>
  </div>
</form>
</div>
@endsection