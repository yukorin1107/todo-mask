<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;


class TaskController extends Controller
{
    public function index() {
        $tasks = Task::all();
        return view('posts.index', compact('tasks'));
}
    
public function create() {
    return view('posts.create');
}

public function store(Request $request) {
    $request->validate([
        'name' => 'required|max:30',
        'description' => 'required|max:140',
        'image' => 'nullable|image|max:2048'
    ]);

    $task = new Task();
    $task->name = $request->name;
    $task->description = $request->description;
    $task->user_id = Auth::id();

    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('images', 'public');
        $task->image_path = $path;
    }

    $task->save();

    return redirect()->route('posts.index');
}

public function edit(Task $task) {
    return view('posts.edit', compact('task'));
}

function show ($id) 
{
    $task = Task::find($id);
    return view ('posts.show', compact('task'));
}

public function update(Request $request, $id) {
    $request->validate([
        'name' => 'required|max:30',
        'description' => 'required|max:140',
        'image' => 'nullable|image|max:2048'
    ]);

    $task = Task::find($id);

    $task->name = $request->name;
    $task->description = $request->description;
    

    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('images', 'public');
        $task->image_path = $path;
    }

    
    $task->save();

    return redirect()->route('posts.show');
}

public function destroy(Task $task) {
    $task->delete();
    return redirect()->route('tasks.index');
}
}