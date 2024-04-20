<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;


class TasksController extends Controller
{
    public function index()
    {

        $tasks = Task::whenSearch(request()->search)
            ->latest()
            ->paginate(10);
            

        return view('tasks.index')->with('tasks', $tasks);
    }

    public function create()
    {
        $tasks = Task::all();
        return view('tasks.create')->with( 'tasks',$tasks);
    }

    public function store(Request $request)
    {

        $request->validate([
            "title" => "required|string|max:255",
            "description" => "nullable|string|max:1000",
            "completed" => "boolean",
        ]);

        $task = Task::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'completed' => $request->input('completed'),
        ]);

        alertSuccess('task created successfully');
        return redirect()->route('tasks.index');
    }

    public function edit(Task $task)
    {

        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {

        $request->validate([
            "title" => "required|string|max:255",
            "description" => "nullable|string|max:1000",
            "completed" => "boolean",
        ]);

        $task->update([

            "title" => $request['title'],
            "description" => $request['description'],
            "completed" => $request['completed'],

        ]);

        alertSuccess('task updated successfully');
        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        alertSuccess('Task deleted successfully');
        return redirect()->route('tasks.index');
    }
}
