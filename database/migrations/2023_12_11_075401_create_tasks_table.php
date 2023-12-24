<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Define a new anonymous class extending the Migration class
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Create the 'tasks' table with specified columns
        Schema::create('tasks', function (Blueprint $table) {
            $table->id(); // Auto-incremental primary key

            $table->string('title'); // String column for the task title
            $table->text('description'); // Text column for the task description
            $table->text('long_description')->nullable(); // Nullable text column for a longer task description
            $table->boolean('completed')->default(false); // Boolean column for the task completion status, default to false
            
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the 'tasks' table if it exists
        Schema::dropIfExists('tasks');
    }
};
