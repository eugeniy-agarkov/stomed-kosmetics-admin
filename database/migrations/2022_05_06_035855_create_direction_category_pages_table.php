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
        Schema::create('direction_category_pages', function (Blueprint $table)
        {

            $table->unsignedInteger('category_id')->nullable(false)->primary();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->text('content')->nullable();

            $table->foreign('category_id', 'fk_category_pages_category_id')->references('id')->on('direction_categories')
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
        Schema::dropIfExists('direction_category_pages');
    }
};
