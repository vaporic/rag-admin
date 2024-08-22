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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->text('logo')->nullable();
            $table->text('favicon')->nullable();
            $table->text('footer')->nullable();
            $table->text('header')->nullable();
            $table->text('title')->nullable();
            $table->text('description')->nullable();
            $table->text('color')->nullable();
            $table->text('background')->nullable();
            $table->text('font')->nullable();
            $table->text('css')->nullable();
            $table->text('js')->nullable();
            $table->text('contact')->nullable();
            $table->unsignedBigInteger('team_id');
            $table->foreign('team_id')
                ->references('id')
                ->on('teams')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
