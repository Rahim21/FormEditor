@extends('layouts.forms')
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

    <div class="formDetail">
        <input type="text" class="input-field mon-shadow @error('title') is-invalid @enderror" name="title" id="title" placeholder="Titre" value="{{ old('title') }}"/>

        <textarea class="input-field mon-shadow @error('message') is-invalid @enderror" id="message" name="message" rows="2" placeholder="Description">{{ old('message') }}</textarea>

        <input type="datetime-local" class="input-field mon-shadow @error('date') is-invalid @enderror" name="date" id="date" placeholder="Date" value="{{ old('date') }}"/>
        
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
            <form id="form-builder" method="post" action="{{route('submit')}}" enctype='multipart/form-data'>
                @csrf

                @if(session()->has('message'))
                    <div class="alert alert-success close-message">
                        {{ session()->get('message') }}
                    </div>
                @endif

                <input type="hidden" id="form-data" name="formulaire" value="">
                <div class="box-rightsave @error('formulaire') is-invalid @enderror" id="contents-2" style="min-height: 150px" name="formulaire" id="formulaire">
                {{ old('formulaire') }}
                </div>
            </form>
        </div>
    </div>
    <div class="options bg-center" style="float: right">
        <button class="cancel btn-danger"><a class="cancel2" href="{{ url('forms') }}"> Annuler </a></button>
        <button class="reset">Reset</button>
        <button class="save">Download PDF</button>
        <button class="form-submit">Enregistrer</button>
    </div>
@endsection