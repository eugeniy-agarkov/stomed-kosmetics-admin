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
        Schema::create('clinic_details', function (Blueprint $table)
        {

            $table->unsignedInteger('clinic_id')->nullable(false);
            $table->string('address')->nullable();
            $table->string('guide')->nullable();
            $table->string('schedule')->nullable();
            $table->string('lat', 20)->nullable();
            $table->string('lng', 20)->nullable();
            $table->longText('route')->nullable();
            $table->longText('content')->nullable();

            $table->primary('clinic_id');
            $table->foreign('clinic_id', 'fk_clinic_details_clinic_id')->references('id')->on('clinics')
                ->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clinic_details');
    }
};
