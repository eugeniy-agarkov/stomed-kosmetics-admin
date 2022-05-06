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
        Schema::create('review_photos', function (Blueprint $table)
        {

            $table->increments('id');
            $table->unsignedInteger('review_id')->nullable(false);
            $table->string('photo')->nullable();

            $table->foreign('review_id', 'fk_review_photos_review_id')->references('id')->on('reviews')
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
        Schema::dropIfExists('review_photos');
    }
};
