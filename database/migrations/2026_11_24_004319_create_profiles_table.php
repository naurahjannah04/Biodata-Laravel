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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('title', 180);
            $table->string('location', 120);
            $table->string('email');
            $table->string('phone', 40)->nullable();
            $table->string('website', 2048)->nullable();
            $table->string('github_url', 2048)->nullable();
            $table->string('linkedin_url', 2048)->nullable();
            $table->string('instagram_url', 2048)->nullable();
            $table->string('avatar_url', 2048)->nullable();
            $table->longText('about');
            $table->text('skills');
            $table->longText('experience');
            $table->longText('education');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
