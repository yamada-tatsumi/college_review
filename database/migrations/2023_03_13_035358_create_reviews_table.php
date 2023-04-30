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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->integer('enjoyment')->default(3);
            $table->integer('cost')->default(3);
            $table->integer('connection')->default(3);
            $table->integer('strict')->default(3);
            $table->integer('often')->default(3);
            $table->integer('scale')->default(3);
            
            $table->string('body', 1000);
            
            $table->timestamps();
            
            $table->foreignId('user_id')->constrained();
            $table->foreignId('club_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
};
