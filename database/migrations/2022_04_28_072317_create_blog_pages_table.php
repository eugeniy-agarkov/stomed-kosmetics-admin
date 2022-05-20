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
        Schema::create('blog_pages', function (Blueprint $table)
        {

            $table->unsignedInteger('blog_id')->nullable(false)->primary();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->text('content')->nullable();

            $table->dateTime('published_at', 0)->default(Carbon::now());

            $table->foreign('blog_id', 'fk_news_page_news_id')->references('id')->on('blogs')
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
        Schema::dropIfExists('blog_pages');
    }
};
