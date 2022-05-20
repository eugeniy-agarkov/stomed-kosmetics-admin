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
        Schema::create('blog_prices', function (Blueprint $table)
        {

            $table->increments('id');
            $table->unsignedInteger('blog_id')->nullable(false);
            $table->string('code')->nullable()->index('idx_news_prices_code');
            $table->unsignedInteger('price')->nullable();
            $table->unsignedInteger('discount_price')->nullable();
            $table->string('description')->nullable();
            $table->string('condition')->nullable();
            $table->unsignedSmallInteger('order')->default(0);

            $table->dateTime('published_at', 0)->default(Carbon::now());

            $table->foreign('blog_id', 'fk_news_prices_news_id')->references('id')->on('blogs')
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
        Schema::dropIfExists('blog_prices');
    }
};
