<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudyTime;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

class StudyTimeController extends Controller
{
    public function create()
    {
        // ユーザーの未完了タスクを取得
        $tasks = Task::where('user_id', Auth::id())->where('is_completed', false)->get();
        return view('study_time.create', compact('tasks'));
    }

    public function store(Request $request)
    {
        $StudyTime = new StudyTime();
        
        $StudyTime->Study_time = $request->StudyTime;
        $StudyTime->date = $request->date;
        $StudyTime->user_id = Auth::id();

        $StudyTime->save();

        Task::where('is_completed', false)->update(['is_completed' => true]);
        
          // フォームから送信されたタスクIDを取得
        // $taskId = $request->task_id;
        // $task = Task::find($taskId);

        // if($task){
        //     $task->is_completed = true;
        //     $task->save();
        // }

        return redirect()->route('posts.index');
    }
}

