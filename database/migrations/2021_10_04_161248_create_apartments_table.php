<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->unsignedTinyInteger('n_beedroom');
            $table->unsignedTinyInteger('n_beds');
            $table->unsignedTinyInteger('n_bathrooms');
            $table->unsignedSmallInteger('square_meters');
            $table->decimal('long', 10, 7);
            $table->decimal('lat', 10, 7);
            $table->text('address');
            $table->text('img');
            $table->boolean('visible')->default(0);
            $table->double('price_per_night', 6, 2);
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
        Schema::dropIfExists('apartments');
    }
}
