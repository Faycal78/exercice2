
@extends('master')

@section('content')

@if($errors->any())
<div class="alert alert-danger">
    <ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    </ul>
</div>
@endif

<div class="card">
    <div class="card-header">Ajouter une Tâche</div>
    <div class="card-body">
        <form method="post" action="{{ route('tasks.store') }}">
            @csrf
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Titre de la Tâche</label>
                <div class="col-sm-10">
                    <input type="text" name="title" class="form-control" />
                </div>
            </div>
            <div class="row mb-4">
                <label class="col-sm-2 col-label-form">Description de la Tâche</label>
                <div class="col-sm-10">
                    <textarea name="description" class="form-control"></textarea>
                </div>
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Ajouter" />
            </div>
            <div>
                <!-- Affichage du nom de l'utilisateur -->
                Utilisateur actuel : {{ Auth::user()->name }}
            </div>
        </form>
    </div>
</div>

@endsection('content')
