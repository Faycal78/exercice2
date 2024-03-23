@extends('master')

@section('content')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col col-md-6"><b>Détails de la Tâche</b></div>
            <div class="col col-md-6">
                <a href="{{ route('tasks.index') }}" class="btn btn-primary btn-sm float-end">Voir Tout</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <label class="col-sm-2 col-label-form"><b>Titre de la Tâche</b></label>
            <div class="col-sm-10">
                {{ $task->title }}
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-label-form"><b>Description de la Tâche</b></label>
            <div class="col-sm-10">
                {{ $task->description }}
            </div>
        </div>
    </div>
</div>

@endsection('content')
