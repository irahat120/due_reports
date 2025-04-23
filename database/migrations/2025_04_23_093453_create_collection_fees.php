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
        Schema::create('collection_fees', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id');
            $table->string('fees_month');
            $table->string('payable_month');
            $table->string('paid')->nullable();
            $table->string('status')->default('Due');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collection_fees');
    }
};
