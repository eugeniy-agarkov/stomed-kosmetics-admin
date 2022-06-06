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
        Schema::create('sales', function (Blueprint $table)
        {

            $table->increments('id');
            $table->unsignedInteger('category_id')->nullable();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->mediumText('excerpt')->nullable();
            $table->longText('content')->nullable();
            $table->string('photo')->nullable();
            $table->unsignedSmallInteger('order')->nullable();
            $table->dateTime('date_end')->nullable();
            $table->boolean('is_active')->default(1);
            $table->boolean('is_home_banner')->default(0);

            $table->dateTime('published_at', 0)->default(Carbon::now());
            $table->softDeletes();

            $table->foreign('category_id')->references('id')->on('sale_categories')
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
        Schema::dropIfExists('sales');
    }
};
