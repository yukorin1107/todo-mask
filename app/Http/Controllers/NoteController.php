<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    //createメソッド
    public function create($task_id)
    {
        $task = Task::find($task_id);
        return view('notes.create', ['task' => $task]);
    }

    //storeメソッド
    public function store(Request $request)
    {
        $task = Task::find($request -> task_id);

        $note = new Note;
        $note -> body = $request -> body;
        $note -> user_id = Auth::id();
        $note -> task_id = $request -> task_id;
        $note -> save();

        return redirect() -> route('posts.show', $task -> id);
    }
}
