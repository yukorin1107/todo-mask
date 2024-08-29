<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Bookmark;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class TaskController extends Controller
{
    // public function index()
    // {
    //     $tasks = Task::all();
    //     // ユーザーの未完了タスクを取得
    //     $tasks = Task::where('user_id', Auth::id())->where('is_completed', false)->get();
    //     return view('posts.index', compact('tasks'));
    // }

    public function index()
    {
        // Fetch all tasks for the current user where is_completed is 0
        $tasks = Task::where('user_id', Auth::id())->where('is_completed', false)->get();

        // Fetch the count of tasks grouped by type where is_completed is 0
        $tasksCountByType = Task::where('user_id', Auth::id())
            ->where('is_completed', 0)
            ->select('type', DB::raw('count(*) as count'))
            ->groupBy('type')
            ->pluck('count', 'type');

        return view('posts.index', compact('tasks', 'tasksCountByType'));
    }

    
    
    public function create() 
    {
        return view('posts.create');
    }

    public function store(Request $request) 
    {
        $request->validate([
            'name' => 'required|max:30',
            'description' => 'required|max:140',
            'type' => 'required|string|in:Reading,Listening,Speaking,Writing,Vocabulary', // typeのバリデーションを追加
            'image' => 'nullable|image|max:2048'
        ]);

        $task = new Task();
        $task->name = $request->name;
        $task->description = $request->description;
        $task->type = $request->type; // typeを追加
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

    public function show ($id) 
    {
        $task = Task::find($id);
        return view ('posts.show', compact('task'));
    }

    public function edit($id) 
    {
        $task = Task::find($id);
        return view('posts.edit', compact('task'));
    }

    public function update(Request $request, $id) 
    {
        $request->validate([
            'name' => 'required|max:30',
            'description' => 'required|max:140',
            'image' => 'nullable|image|max:2048'
        ]);


        $task = Task::find($id);
        
        $task->name = $request->name;
        $task->description = $request->description;
        $task->type = $request->type;
        
        if(request('image')){
            $original = request()->file('image')->getClientOriginalName();
            $name=date('Ymd_His').'_'.$original;
            request()->file('image')->move('storage/images', $name);
            $task->image = $name;
        }

        $task->save();

        return view('posts.show', compact('task'));
    }

    public function destroy($id) 
    {
        $task = Task::find($id);
        $task->delete();
        return redirect()->route('posts.index');
    }

    public function completedTasks()
    {
        $completedTasks = Task::where('user_id', Auth::id())->where('is_completed', true)->get();
        return view('Complete.index', compact('completedTasks'));
    }

    public function bookmark($id)
{
    $bookmark = new Bookmark();
    $bookmark->user_id = Auth::id();
    $bookmark->task_id = $id;
    $bookmark->save();

    return redirect()->back()->with('success', 'タスクをブックマークしました。');
}


    //taskカウント
    // public function showIncompleteTasksByType()
    // {
    //     // Fetch the count of tasks grouped by type where is_completed is 0
    //     $tasksCountByType = DB::table('tasks')
    //         ->select('type', DB::raw('count(*) as count'))
    //         ->where('is_completed', 0)
    //         ->groupBy('type')
    //         ->pluck('count', 'type');

    //     // Get all tasks where is_completed is 0
    //     $tasks = Task::where('is_completed', 0)->get();
    
    //     return view('posts.index', compact('tasksCountByType'));
    // }
    
    


}