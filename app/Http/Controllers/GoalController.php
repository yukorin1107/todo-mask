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

        return redirect()->route('goals.confirmation', $goal->id);
    }

    public function confirmation($id)
    {
        $goal = Goal::find($id);
        return view('goals.confirmation', ['goal' => $goal]);
    }

    // public function laststep()
    // {
    //     return view('FirstTask.laststep');
    // }

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

        $goal =Goal::find($id);

        $goal -> goal_body = $request ->goal_body;
        $goal -> save();

        return redirect()->route('goals.confirmation', $goal->id);
    }

    // public function update(Request $request, $id)
    // {
    //     // Optionally, validate the input if needed
    //     // $request->validate([
    //     //     'goal_body' => 'required|string|max:255',
    //     // ]);
    
    //     // Find the goal by ID
    //     $goal = Goal::find($id);
    
    //     // Update the goal_body field with the data from the request
    //     $goal->goal_body = $request->goal_body;
    //     $goal->save();
    
    //     // Get the previous URL
    //     $previousUrl = url()->previous();
    
    //     // Conditional redirection based on the previous page
    //     if (strpos($previousUrl, route('mypages.mypage')) !== false) {
    //         // If the previous page is mypages.mypage, redirect back there
    //         return redirect()->route('mypages.mypage');
    //     } elseif (strpos($previousUrl, route('goals.edit', $id)) !== false || strpos($previousUrl, route('goals.confirmation', $id)) !== false) {
    //         // If the previous page is goals.edit or goals.confirmation, redirect to goals.confirmation
    //         return redirect()->route('goals.confirmation', $id);
    //     } else {
    //         // Fallback redirect (optional, in case the previous URL does not match any conditions)
    //         return redirect()->route('goals.index'); // or any other default route
    //     }
    // }

    public function editGoalProfile($id)
    {
        $goal = Goal::find($id);
        return view('goals.edit-profile', ['goal' => $goal]);
    }

    public function updateGoalProfile(Request $request, $id)
    {

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
