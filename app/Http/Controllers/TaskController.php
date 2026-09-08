<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        if(! auth()->check()) {
            return redirect()->route('login'); // Redirect für nicht authorisierte user
        }

        $tasks = Task::where('done', true)->latest()->paginate(5);
        return view('tasks.index', ['tasks' => $tasks]); //pfadstrukturen mit . nicht mit /
    }

    public function show(Task $task)
    {
        if(! auth()->check()) {
            return redirect()->route('login'); // Redirect für nicht authorisierte user
        }
        
        return view('tasks.show', compact('task'));  //return view('tasks.show', ['task' => $task]); 
    }
    public function create()
    {
        return view('tasks.tasks_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|text',
        ]);

        Task::create($request->only('title', 'description'));

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    } 
    public function edit(Task $task)
    {
        return view('tasks.task_edit');
    }
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|text',
            'done'=>'accepted',
        ]);

        $task->update($request->only(['title','description','done']));
        return redirect('tasks.show')->with('success','Aufgabe geändert');

    }
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('welcome')->with('success','Aufgabe gelöscht');
    }
}
