<?php

use App\Models\EventAttendee;
use App\Models\User;
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
            $table->foreignIdFor(EventAttendee::class);
            $table->timestamps();
            $table->string('activity_details');
            $table->string('activity');
            $table->enum('status', ['to do', 'in progress', 'done'])->default('to do'); // Define the status column as an ENUM with default 'to do'
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
