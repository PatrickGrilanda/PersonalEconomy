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
        Schema::create('transactions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('account_id')->nullable();
            $table->uuid('credit_card_id')->nullable();
            $table->uuid('category_id');
            $table->date('date');
            $table->integer('current_installment');
            $table->integer('total_installments');
            $table->decimal('value', 8, 2);
            $table->enum('period_type', ['unique', 'fixed', 'repetition']);
            $table->text('description')->nullable();
            $table->enum('status', ['waiting payment', 'paid', 'received']);
            $table->timestamps();


            $table->foreign('account_id')->references('id')->on('accounts');
            $table->foreign('credit_card_id')->references('id')->on('credit_cards');
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
