@extends('master')

@section('content')

@if($message = Session::get('success'))

<div class="alert alert-success">
    {{ $message }}
</div>

@endif

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col col-md-6"><b>Liste des Tâches</b></div>
            <div class="col col-md-6">
                <a href="{{ route('tasks.create') }}" class="btn btn-success btn-sm float-end">Ajouter une Tâche</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>#</th>
                <th>Titre</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
            @if(count($tasks) > 0)

                @foreach($tasks as $task)

                    <tr>
                        <td>{{ $task->id }}</td>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td>
                            <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-info">Voir</a>
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary">Modifier</a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>

                @endforeach

            @else
                <tr>
                    <td colspan="4" class="text-center">Aucune tâche trouvée</td>
                </tr>
            @endif
        </table>
    </div>
</div>

<div>
    <!-- Affichage du nom de l'utilisateur -->
    Utilisateur actuel : {{ Auth::user()->name }}
</div>

@endsection
