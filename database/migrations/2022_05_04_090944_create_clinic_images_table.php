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
        Schema::create('clinic_images', function (Blueprint $table)
        {

            $table->id();
            $table->unsignedInteger('clinic_id')->nullable(false);
            $table->string('image')->nullable();
            $table->string('alt')->nullable();
            $table->string('title')->nullable();
            $table->dateTime('published_at', 0)->default(\DB::raw('CURRENT_TIMESTAMP'));

            $table->foreign('clinic_id', 'fk_clinic_images_clinic_id')->references('id')->on('clinics')
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
        Schema::dropIfExists('clinic_images');
    }
};
