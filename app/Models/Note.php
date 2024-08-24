<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    //taskテーブルとのリレーション
    public function task()
    {
        return $this -> belongsTo('App\Models\Task');
    }

    //userテーブルとのリレーション
    public function user()
    {
        return $this -> belongsTo('App\Models\User');
    }



}
