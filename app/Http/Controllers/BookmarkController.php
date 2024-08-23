<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\Task;
// use Illuminate\Support\Facades\Auth;

use App\Models\Bookmark;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

// class BookmarkController extends Controller
// {
//     public function store(Task $task)  
//     {
//         $task->users()->attach(Auth::id());
//         return redirect()->route('posts.index');
//     }
    

//     public function destroy(Task $task)
//     {
//         $task->users()->detach(Auth::id());
//         return redirect()->route('posts.index');
//     }
// }

class BookmarkController extends Controller
{
    public function store(Task $task)  
    {
        Bookmark::create([
            'user_id' => Auth::id(),
            'task_id' => $task->id,
        ]);

        return redirect()->route('posts.index');
    }

    public function destroy(Task $task)
    {
        Bookmark::where('user_id', Auth::id())->where('task_id', $task->id)->delete();

        return redirect()->route('posts.index');
    }
}
