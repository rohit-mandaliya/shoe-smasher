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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id');
            $table->string('order_no', 50);
            $table->string('shoe_ids', 10);
            $table->string('size', 50);
            $table->string('quantity', 50);
            $table->double('total_price');
            $table->string('card_no', 50)->nullable();
            $table->string('card_name', 50)->nullable();
            $table->string('card_exp', 50)->nullable();
            $table->tinyInteger('is_cod')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
