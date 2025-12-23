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
        Schema::create('payments', function (Blueprint $table) {
            $table->id('payment_id');
            $table->unsignedBigInteger('submission_id');
            $table->date('payment_date');
            $table->bigInteger('amount_of_paid');
            $table->bigInteger('remaining_debt');
            $table->string('status');
            $table->text('note')->nullable();
            $table->timestamps();

            $table->foreign('submission_id')->references('submission_id')->on('submissions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
