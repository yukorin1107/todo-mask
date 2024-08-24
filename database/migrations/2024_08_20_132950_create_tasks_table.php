<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // タスク名
            $table->text('description'); // 説明
            $table->string('type'); // このカラムにタスクの種類を保存
            $table->string('image')->nullable(); // 画像（nullableは画像がなくてもOKという意味）
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // ユーザーID
            $table->timestamps(); // created_at と updated_at
            
            //↓なぜ2個あるの？一応コメントアウトしておくね
            // $table->string('image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
