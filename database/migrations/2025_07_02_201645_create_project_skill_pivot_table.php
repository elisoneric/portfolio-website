<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // database/migrations/[timestamp]_create_project_skill_table.php
Schema::create('project_skill', function (Blueprint $table) {
    $table->id();
    $table->foreignId('project_id')->constrained()->cascadeOnDelete();
    $table->foreignId('skill_id')->constrained()->cascadeOnDelete();
    $table->timestamps();
    
    // Optional: Add unique constraint
    $table->unique(['project_id', 'skill_id']);
});
    }

    public function down()
    {
        Schema::dropIfExists('project_skill');
    }
};