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
        Schema::create('doctor_sertificats', function (Blueprint $table)
        {

            $table->increments('id');
            $table->unsignedInteger('doctor_id')->nullable(false);
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->string('alt')->nullable();
            $table->string('title')->nullable();

            $table->dateTime('published_at', 0)->default(Carbon::now());
            $table->softDeletes();

            $table->foreign('doctor_id', 'fk_doctor_sertificats_doctor_id')->references('id')->on('doctors')
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
        Schema::dropIfExists('doctor_sertificats');
    }
};
