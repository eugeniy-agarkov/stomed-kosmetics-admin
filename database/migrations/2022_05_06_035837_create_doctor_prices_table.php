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
        Schema::create('doctor_prices', function (Blueprint $table)
        {

            $table->increments('id');
            $table->unsignedInteger('doctor_id')->nullable(false);
            $table->unsignedInteger('direction_id')->nullable();
            $table->string('code')->nullable()->index('idx_doctor_prices_code');
            $table->unsignedInteger('price')->nullable();
            $table->unsignedInteger('discount_price')->nullable();
            $table->string('description')->nullable();
            $table->string('condition')->nullable();
            $table->unsignedSmallInteger('order')->nullable();

            $table->dateTime('published_at', 0)->default(Carbon::now());

            $table->foreign('doctor_id', 'fk_doctor_prices_doctor_id')->references('id')->on('doctors')
                ->onDelete('cascade');
            $table->foreign('direction_id', 'fk_doctor_prices_direction_id')->references('id')->on('directions')
                ->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctor_prices');
    }
};
