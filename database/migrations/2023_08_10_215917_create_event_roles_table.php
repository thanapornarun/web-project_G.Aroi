<?php

use App\Models\EventAttendee;
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
        Schema::create('event_roles', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(EventAttendee::class);
            $table->timestamps();
            $table->enum('roles', ['staff', 'treasurer', 'event attendee', 'guest', 'owner'])->default('guest');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_roles');
    }
};
