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
            $table->char('name', length:100);
            $table->string('description');
            $table->boolean('is_completed');
            $table->timestamp('start_at');
            $table->timestamp('expired_at');
            $table->timestamps();

            $table->foreignId('user_id')->constrained();
            $table->foreignId('company_id')->constrained();
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
