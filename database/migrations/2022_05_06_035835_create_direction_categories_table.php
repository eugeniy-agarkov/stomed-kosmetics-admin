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
        Schema::create('direction_categories', function (Blueprint $table)
        {

            $table->increments('id');
            $table->unsignedInteger('parent_id')->nullable();
            $table->string('slug')->nullable();
            $table->string('name')->nullable(false);
            $table->string('title_menu')->nullable(false);
            $table->string('image')->nullable();
            $table->boolean('is_active')->default(1);
            $table->unsignedSmallInteger('order')->default(0);

            $table->dateTime('published_at', 0)->default(\DB::raw('CURRENT_TIMESTAMP'));

            $table->foreign('parent_id')->references('id')->on('direction_categories')
                ->onDelete('set null');

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
        Schema::dropIfExists('direction_categories');
    }
};
