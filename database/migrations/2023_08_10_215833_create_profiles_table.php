<?php

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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(User::class);
            $table->string('full_name');
            $table->enum('gender', ['female', 'male', 'not specified'])->default('not specified');
            $table->string('address')->default('enter your address');
            $table->string('phone_number')->default('000-000-0000');
            $table->string('profile_picture')->default('/images/user.png');
            $table->date('date_of_birth');
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
