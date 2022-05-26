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
            $table->string('h1')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->boolean('robots')->default(1);
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
