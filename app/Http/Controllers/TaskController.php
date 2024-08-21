<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;


class TaskController extends Controller
{
    public function index() {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
}
    
public function create() {
    return view('tasks.create');
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
    return view('tasks.edit', compact('task'));
}

public function update(Request $request, Task $task) {
    $request->validate([
        'name' => 'required|max:30',
        'description' => 'required|max:140',
        'image' => 'nullable|image|max:2048'
    ]);

    $task->name = $request->name;
    $task->description = $request->description;
    $task->user_id = Auth::id();

    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('images', 'public');
        $task->image_path = $path;
    }

    $task->save();

    return redirect()->route('tasks.index');
}

public function destroy(Task $task) {
    $task->delete();
    return redirect()->route('tasks.index');
}
}