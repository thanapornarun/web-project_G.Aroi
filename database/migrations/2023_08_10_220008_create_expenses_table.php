<?php

use App\Models\Event;
use App\Models\Budget;
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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Budget::class);
            $table->string('bill_name');
            $table->string('bill_path')->default("istockphoto-889405434-612x612.jpg");
            $table->string('description');
            $table->decimal('amount');
            $table->datetime('expense_date')->default('1111-11-11 11:11:11');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
