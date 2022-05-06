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
        Schema::create('doctor_pages', function (Blueprint $table)
        {

            $table->unsignedInteger('doctor_id')->nullable(false)->primary();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->text('content')->nullable();

            $table->foreign('doctor_id', 'fk_doctor_pages_doctor_id')->references('id')->on('doctors')
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
        Schema::dropIfExists('doctor_pages');
    }
};
