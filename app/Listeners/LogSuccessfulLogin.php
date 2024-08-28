<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Auth\Events\Login;
use App\Models\LoginRecord;
use Illuminate\Support\Facades\Auth;

class LogSuccessfulLogin
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Login $event): void
    {
         // ログインしたユーザーのIDを取得
        $userId = $event->user->id;
        
        // ログインレコードを作成
        LoginRecord::create([
            'user_id' => $event->user->id,
            'login_at' => now(),
        ]);
    }
}
