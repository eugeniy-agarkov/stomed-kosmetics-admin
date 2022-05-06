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
        Schema::create('direction_pages', function (Blueprint $table)
        {

            $table->unsignedInteger('direction_id')->nullable(false)->primary();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->text('content')->nullable();

            $table->foreign('direction_id', 'fk_direction_pages_direction_id')->references('id')->on('directions')
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
        Schema::dropIfExists('direction_pages');
    }
};
