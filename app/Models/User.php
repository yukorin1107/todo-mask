<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_image'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    //ブックマークとのリレーション
    public function bookmarks()
    {
        return $this->belongsToMany('App\Task')->withTimestamps();
    }

    //Noteモデルとのリレーション
    public function notes()
    {
        return $this -> hasMany('App\Models\Note');
    }

    //taskモデルとのリレーション
    public function tasks()
    {
        return $this -> hasMany('App\Models\Task');
    }
    
    //連続ログイン日数を計算するメソッド
    public function getConsecutiveLoginDays()
    {
    $loginRecords = LoginRecord::where('user_id', $this->id)
        ->orderBy('login_at', 'desc')
        ->pluck('login_at');

    $consecutiveDays = 1; // 連続ログインの初期値を1に設定
    $currentDate = Carbon::today();
    
    foreach ($loginRecords as $record) {
        $record = Carbon::parse($record);  // 文字列をCarbonインスタンスに変換
        if ($record->toDateString() === $currentDate->toDateString()) {
            $consecutiveDays++;
            $currentDate = $currentDate->subDay();
        } else {
            break;
        }
    }
    
    return $consecutiveDays;
    }
}
