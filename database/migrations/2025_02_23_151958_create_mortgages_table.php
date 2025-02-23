<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('mortgages', function (Blueprint $table) {
            $table->id(); // Создает поле id (uint)
            $table->string('title'); // Поле TITLE (string)
            $table->boolean('is_active')->default(false); // Поле IS_ACTIVE (bool)
            $table->string('description')->nullable(); // Поле DESCRIPTION (string)
            $table->integer('percent')->max(40); // Поле PERCENT (int)
            $table->integer('min_first_payment')->max(98); // Поле MIN_FIRST_PAYMENT (int)
            $table->float('max_price'); // Поле MAX_PRICE (float)
            $table->float('min_price'); // Поле MIN_PRICE (float)
            $table->integer('min_term'); // Поле MIN_TERM (int)
            $table->integer('max_term'); // Поле MAX_TERM (int)
            $table->timestamps(); // Создает поля created_at и updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('mortgages');
    }
};
