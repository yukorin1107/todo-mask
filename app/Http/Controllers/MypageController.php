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
    $user = Auth::user();//現在のユーザーを取得
    $goal = Goal::where('user_id', Auth::id())->first();//現在のユーザーの目標を取得

    $consecutiveLoginDays = $user->getConsecutiveLoginDays();;//連続ログイン日数を取得

    $StudyTime = StudyTime::where('user_id', Auth::id())->sum('study_time');//現在のユーザーの学習時間の合計を取得
    

    return view('mypages.mypage', compact('goal', 'StudyTime', 'consecutiveLoginDays'));
}

 
    // $loginStreak = LoginStreak::where('user_id', Auth::id())->first()->streak ?? 0;
    // $studyTime = StudyTime::where('user_id', Auth::id())->sum('hour');



}

