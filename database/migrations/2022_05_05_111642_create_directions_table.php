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
        Schema::create('directions', function (Blueprint $table)
        {

            $table->increments('id');
            $table->unsignedInteger('category_id')->nullable(false);
            $table->unsignedInteger('clinic_id')->nullable(false);
            $table->string('slug')->nullable();
            $table->string('name')->nullable(false);
            $table->string('image')->nullable();
            $table->boolean('is_top')->default(true);
            $table->boolean('is_active')->default(true);

            $table->dateTime('published_at', 0)->default(\DB::raw('CURRENT_TIMESTAMP'));

            $table->foreign('category_id', 'fk_category_direction_id')->references('id')->on('direction_categories')
                ->onDelete('cascade');
            $table->foreign('clinic_id', 'fk_clinic_id')->references('id')->on('clinics')
                ->onDelete('cascade');

            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('directions');
    }
};
