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
        Schema::create('sessions', function (Blueprint $table) {
            $table->id('key')->autoIncrement();
            $table->uuid('id')->unique();
            $table->foreignId('package_id')->constrained();
            $table->integer('user_id');
            $table->string('redirect_url')->nullable();
            $table->boolean('completed');
            $table->string('scores')->nullable();
            $table->foreignId('section_id')->nullable()->constrained();
            $table->foreignId('question_id')->nullable()->constrained();
            $table->integer('first_time')->nullable();
            $table->integer('last_time')->nullable();
            $table->timestamp('started_at');
            $table->timestamp('finished_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
    }
};
