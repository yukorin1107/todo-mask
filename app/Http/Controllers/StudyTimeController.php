<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudyTime;
use Illuminate\Support\Facades\Auth;

class StudyTimeController extends Controller
{
    public function create()
    {
        return view('StudyTime.create');
    }

    public function store(Request $request)
    {
        $StudyTime = new StudyTime();
        
        $StudyTime->study_time = $request->StudyTime;
        $StudyTime->date = $request->date;
        $StudyTime->user_id = Auth::id();

        $StudyTime->save();

<<<<<<< Updated upstream
        return redirect()->route('posts.index')->with('success', '学習時間が記録されました。');
=======
        return redirect()->route('posts.index');
        // return redirect()->route('mypage');
>>>>>>> Stashed changes
    }
}

