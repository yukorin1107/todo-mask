<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goal;
use Illuminate\Support\Facades\Auth;
use App\Models\StudyTime;

class MypageController extends Controller
{
    public function index()
{
    $goals = Goal::where('user_id', Auth::id())->get();


    $StudyTime = StudyTime::where('user_id', Auth::id())->sum('study_time');

    return view('mypages.mypage', compact('goals', 'StudyTime'));
}

    // $loginStreak = LoginStreak::where('user_id', Auth::id())->first()->streak ?? 0;
    // $studyTime = StudyTime::where('user_id', Auth::id())->sum('hour');


}

