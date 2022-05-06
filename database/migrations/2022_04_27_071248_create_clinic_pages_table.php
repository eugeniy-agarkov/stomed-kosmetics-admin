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
        Schema::create('clinic_pages', function (Blueprint $table)
        {

            $table->unsignedInteger('clinic_id')->nullable(false)->primary();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->text('h1')->nullable();
            $table->text('features')->nullable();
            $table->text('caption')->nullable();
            $table->text('content')->nullable();
            $table->text('route')->nullable();

            $table->foreign('clinic_id', 'fk_clinic_page_clinic_id')->references('id')->on('clinics')
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
        Schema::dropIfExists('clinic_pages');
    }
};
