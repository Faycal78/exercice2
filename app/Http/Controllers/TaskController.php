<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('dashboard', ['tasks' => $tasks]);
    }

    public function create()
    {
        return view('tasks.create');
    }




    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);


        $user = Auth::user();
        $task = $user->tasks()->create($validatedData);


        return redirect()->route('tasks.index');
    }


    public function show(string $id)
    {

        $task = Task::findOrFail($id);
        return view('tasks.show', compact('task'));
    }

    public function edit(string $id)
    {

        $task = Task::findOrFail($id);
        return view('tasks.edit', compact('task'));
    }


    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);


        $task = Task::findOrFail($id);
        $task->update($validatedData);


        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Supprimer la tâche spécifiée
        $task = Task::findOrFail($id);
        $task->delete();

        // Rediriger vers la liste des tâches
        return redirect()->route('tasks.index');
    }
}
