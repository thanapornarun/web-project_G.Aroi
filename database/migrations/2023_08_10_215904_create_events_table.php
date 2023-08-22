<?php

use App\Models\Event;
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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(User::class);
            $table->string('event_poster_path')->default('public/images/8084597.jpg');
            $table->string('event_name');
            $table->string('event_place');
            $table->integer('attendee_count');
            $table->string('description');
            $table->datetime('start_date');
            $table->datetime('end_date');
            $table->enum('category', ['Education', 'Music and Festival']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
