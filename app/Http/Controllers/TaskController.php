<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
       // if(! Auth::check()) {
       //     return redirect()->route('login'); // Redirect für nicht authorisierte user
       // }

        $tasks = Task::latest()->paginate(5);  //letzten 5 task anzeigen
        return view('tasks.index', ['tasks' => $tasks]); //pfadstrukturen mit . nicht mit /
    }

    public function show(Task $task)
    {
    //    if(! Auth::check()) {
    //        return redirect()->route('login'); // Redirect für nicht authorisierte user
    //    }
        
        return view('tasks.show', compact('task'));  //return view('tasks.show', ['task' => $task]); 
    }
    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
     $validated = $request->validate([
            'title'         => ['required', 'string', 'max:50'],
            'description'   => ['required', 'string', 'max:500'],
        ]);
        $validated['user_id'] = auth()->id(); // Der aktuell eingeloggte User
        $validated['done'] = false;

        Task::create($validated);

        return redirect()->route('dashboard')->with('success', 'Task created successfully.');
    } 
   public function edit(Task $task)
    {
       return view('tasks.edit' , compact('task'));
    }

    public function update(Request $request, Task $task)
    {
       $validated = $request->validate([
            'title'         => ['required', 'string', 'max:50'],
            'description'   => ['required', 'string', 'max:500'],
        ]);
         $validated['user_id'] = auth()->id(); // Der aktuell eingeloggte User
        $validated['done'] = false;

        $task->update($request->only(['title', 'description']));
        return redirect('tasks.show')->with('success', 'Deine Aufgaben wurden geändert');
    }
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('tasks.show')->with('success','Deine Aufgabe wurde gelöscht');
    }



    public function toggle(Task $task)
    {
        //nur der Ersteller darf seine Aufgabe umschalten
        // abort_if($task->user_id !== auth()->id(), 403);

        $task->done = !$task->done;
        $task->save();

        $message = $task->done ? 'Aufgabe erledigt' : 'Aufgabe wieder geöffnet';

        return back()->with('success', $message);

    }

}
