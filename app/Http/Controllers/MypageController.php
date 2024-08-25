<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goal;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    public function index()
{
    $goals = Goal::where('user_id', Auth::id())->get();
    // $loginStreak = LoginStreak::where('user_id', Auth::id())->first()->streak ?? 0;
    // $studyTime = StudyTime::where('user_id', Auth::id())->sum('time_spent');

    return view('mypages.mypage', compact('goals'));
}



}
