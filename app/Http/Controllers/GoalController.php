<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goal;
use Illuminate\Support\Facades\Auth;

class GoalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $goals = Goal::where('user_id', Auth::id())->get();
        return view('goals.index', compact('goals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('goals.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'goal_body' => 'required|string|max:255',
        ]);
    
        $goal = new Goal();

        $goal->goal_body = $request->goal_body;
        $goal->user_id = Auth::id();
        $goal->save();

        // return redirect()->route('first.create');
        return redirect()->route('mypages.mypage');
    }

    public function showMypage()
    {
    // ログインしているユーザーの目標を1つ取得
    $goal = Goal::where('user_id', Auth::id())->latest()->first();

    // mypage.blade.php というビューを表示し、そこに目標データを渡す
    return view('mypage', compact('goal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $goal = Goal::find($id);
        return view('goals.edit', ['goal' => $goal]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'goal_body' => 'required|string|max:255',
        // ]);

        $goal =Goal::find($id);

        $goal -> goal_body = $request ->goal_body;
        $goal -> save();

        return redirect()->route('mypages.mypage');
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // {
    //     //
    // }
}
