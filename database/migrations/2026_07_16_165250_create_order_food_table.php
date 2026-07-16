<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('order_food', function (Blueprint $table) {
            $table->id();

            $table->foreignId('food_id')->constrained('foods')->onDelete('cascade');

            $table->string('order_no');
            $table->string('name');
            $table->string('mobile');
            $table->integer('quantity');
            $table->decimal('total_price', 10, 2);
            $table->string('room_no');
            $table->string('payment_method');
            $table->string('payment_status')->default('Pending');
            $table->string('order_status')->default('Pending');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_food');
    }
};
