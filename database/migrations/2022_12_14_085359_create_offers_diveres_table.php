<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersDiveresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers_diveres', function (Blueprint $table) {
             $table->id();
            $table->foreignId('driver_id')->nullable()->constrained('drivers')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('offers')->nullable();
            $table->string('user_id')->nullable();
            $table->string('type')->nullable();
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
        Schema::dropIfExists('offers_diveres');
    }
}
