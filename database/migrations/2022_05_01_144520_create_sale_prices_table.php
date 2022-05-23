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
        Schema::create('sale_prices', function (Blueprint $table)
        {

            $table->increments('id');
            $table->unsignedInteger('sale_id')->nullable(false);
            $table->unsignedInteger('clinic_id')->nullable();
            $table->string('code')->nullable()->index('idx_sales_prices_code');
            $table->unsignedInteger('price')->nullable();
            $table->unsignedInteger('discount_price')->nullable();
            $table->string('description')->nullable();
            $table->string('condition')->nullable();
            $table->unsignedSmallInteger('order')->default(0);

            $table->dateTime('published_at', 0)->default(Carbon::now());

            $table->foreign('sale_id', 'fk_sales_prices_news_id')->references('id')->on('sales')
                ->onDelete('cascade');
            $table->foreign('clinic_id', 'fk_clinic_sale_clinic_id')->references('id')->on('clinics')
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
        Schema::dropIfExists('sale_prices');
    }
};
