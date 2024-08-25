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
        
        $StudyTime->Study_time = $request->StudyTime;
        $StudyTime->date = $request->date;
        $StudyTime->user_id = Auth::id();

        $StudyTime->save();

        return redirect()->route('posts.index');
    }
}

