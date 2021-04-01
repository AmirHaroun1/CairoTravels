<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id');

            $table->foreign('company_id')
                ->references('id')
                ->on('companies')
                ->onDelete('cascade');

            $table->string('title');
            $table->string('destination');
            $table->string('description');
            $table->string('hotel');
            $table->double('price')->default(1000);
            $table->dateTime('arrivalDate');
            $table->dateTime('returnDate');

            $table->string('pickupLocation');
            $table->dateTime('pickupDate');

            $table->date('lastDayToBook')->nullable();

            $table->integer('availablePlaces');

            $table->integer('bookedPlaces')->default(0);

            $table->boolean('active')->nullable(1);

            $table->string('image')->nullable();
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
        Schema::dropIfExists('tours');
    }
}
