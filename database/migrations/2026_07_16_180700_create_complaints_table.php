<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();

            $table->foreignId('room_id')->constrained('floor_maps')->onDelete('cascade');

            $table->string('complaint_type');
            $table->text('complaint');

            $table->enum('status', [
                'Pending',
                'In Progress',
                'Resolved',
                'Closed',
            ])->default('Pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('complaints');
    }
};
