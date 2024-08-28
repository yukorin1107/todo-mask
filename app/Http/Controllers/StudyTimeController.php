<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudyTime;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

class StudyTimeController extends Controller
{
    public function create(Request $request)
{
    $taskId = $request->query('task_id');
    return view('study_time.create', compact('taskId'));
}


    public function store(Request $request)
    {
        $StudyTime = new StudyTime();
        
        $StudyTime->study_time = $request->StudyTime;
        $StudyTime->date = $request->date;
        $StudyTime->user_id = Auth::id();
        $StudyTime->save();


        $taskId = $request->input('task_id');
        $task = Task::where('id', $taskId)->where('user_id', Auth::id())->first();
    
        if ($task) {
            $task->is_completed = true;
            $task->save();
        }


        return redirect()->route('posts.index')->with('success', '学習時間が記録されました。');

    }


    // private function shouldCompleteTask(Task $task, StudyTime $studyTime)
    // {
    //     タスク完了の条件を定義
    //     例: 勉強時間が0.1時間以上であれば完了とする
    //     if ($studyTime->Study_time >= 0.1) {
    //         return true;
    //     }
        
    //     return false;
    // }
}

