<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Carbon;
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
        Schema::create('direction_images', function (Blueprint $table)
        {

            $table->increments('id');
            $table->unsignedInteger('direction_id')->nullable(false);
            $table->string('image')->nullable();
            $table->string('alt')->nullable();
            $table->string('title')->nullable();
            $table->dateTime('published_at', 0)->default(Carbon::now());

            $table->foreign('direction_id', 'fk_direction_images_direction_id')->references('id')->on('directions')
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
        Schema::dropIfExists('direction_images');
    }
};
