<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class FirstTaskController extends Controller
{
    public function index() {
        $tasks = Task::all();
        return view('posts.index', compact('tasks'));
}

public function create() {
    return view('FirstTask.create');
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

    if(request('image')){
        $original = request()->file('image')->getClientOriginalName();
        $name=date('Ymd_His').'_'.$original;
        request()->file('image')->move('storage/images', $name);
        $task->image = $name;
    }

    $task->save();

    return redirect()->route('posts.index');
}
}
