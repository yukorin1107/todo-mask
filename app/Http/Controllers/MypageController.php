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
    public function updateProfileImage(Request $request)
{
    $request->validate([
        'profile_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $user = Auth::user();
    if ($request->file('profile_image')) {
        $imageName = time().'.'.$request->profile_image->extension();
        $request->profile_image->move(public_path('images'), $imageName);
        $user->profile_image = $imageName;
        $user->save();
    }

    return redirect()->route('mypages.mypage')->with('success', 'プロフィール画像を更新しました。');
}



}

