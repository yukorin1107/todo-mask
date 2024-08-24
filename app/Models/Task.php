<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Task extends Model
{
    use HasFactory;

    public function User()
    {
        return $this->belongsTo('App\User')->withTimestamps();
    }
    public function Users()
    {
        return $this->belongsToMany('App\Models\User')->withTimestamps();
    }

    //Noteモデルとのリレーション
    public function notes()
    {
        return $this -> hasMany('App\Models\Note');
    }

    //とりあえずUserとのリレーションは上記に記述があるためなし



}
