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


    //一括代入:複数の属性に対して一度にデータを割り当てる方法
    //セキュリティリスクが伴うため、$fillableや$guardedを使って安全に管理する必要
    //$fillable**を設定することで、安全なカラムのみを一括代入可能にすることができる
    protected $fillable = ['name', 'description', 'type', 'image', 'user_id'];



}
