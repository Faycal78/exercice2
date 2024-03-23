@extends('master')

@section('content')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col col-md-6"><b>Modifier la Tâche</b></div>
            <div class="col col-md-6">
                <a href="{{ route('tasks.index') }}" class="btn btn-primary btn-sm float-end">Retour</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        @if($task)
            <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">Titre</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $task->title }}">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description">{{ $task->description }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Modifier</button>
            </form>
        @else
            <div class="alert alert-danger">Tâche non trouvée</div>
        @endif
    </div>
</div>

@endsection
