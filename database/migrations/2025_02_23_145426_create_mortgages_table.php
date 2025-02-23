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
        Schema::create('mortgages', function (Blueprint $table) {
            $table->id(); // uint, A_I
            $table->string('title'); // TITLE
            $table->boolean('is_active')->default(false); // IS_ACTIVE
            $table->string('description'); // DESCRIPTION
            $table->integer('percent')->max(40); // PERCENT
            $table->integer('min_first_payment')->max(98); // MIN_FIRST_PAYMENT
            $table->float('max_price'); // MAX_PRICE
            $table->float('min_price'); // MIN_PRICE
            $table->integer('min_term'); // MIN_TERM
            $table->integer('max_term'); // MAX_TERM
            $table->timestamps(); // created_at и updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('mortgages');
    }
};