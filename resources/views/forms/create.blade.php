@extends('layouts.app')
@section('content-title') Création d'un formulaire @endsection
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

<form action="{{ url('forms') }}" method="POST">
  @csrf
  <div class="mb-3 row">
    <label for="title" class="col-sm-2 col-form-label"> Titre </label>
    <div class="col-sm-10">
      <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Saisir le titre de l'actualité" value="{{ old('title') }}"/>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="message" class="col-sm-2 col-form-label"> Message </label>
    <div class="col-sm-10">
      <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="3" placeholder="Saisir le message de l'actualité">{{ old('message') }}</textarea>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="date" class="col-sm-2 col-form-label"> Date </label>
    <div class="col-sm-10">
      <input type="datetime-local" class="form-control @error('date') is-invalid @enderror" name="date" id="date" placeholder="Saisir la date de l'actualité" value="{{ old('date') }}"/>
    </div>
  </div>
  <div class="mb-3">
    <div class="offset-sm-2 col-sm-10">
    <button class="btn btn-primary mb-1 mr-1" type="submit"> Ajouter </button>
    <a href="{{ url('forms') }}" class="btn btn-danger mb-1"> Annuler </a>
  </div>
</form>
@endsection