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
        Schema::create('shoes', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->double('price');
            $table->integer('discount');
            $table->tinyInteger('type')->comment("1=>Sports 2=>Casual 3=>Formal");
            $table->string('image', 50);
            $table->text('description');
            $table->tinyInteger('is_active')->comment('1=>Active 2=>Inactive')->default(0);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shoes');
    }
};
