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
        Schema::create('clinics', function (Blueprint $table)
        {

            $table->increments('id');
            $table->string('code')->nullable()->index('idx_clinics_code');
            $table->string('slug')->nullable();
            $table->string('name')->nullable(false);
            $table->string('short_name')->nullable(false);
            $table->boolean('is_active')->default(1);

            $table->dateTime('published_at', 0)->default(Carbon::now());
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
        Schema::dropIfExists('clinics');
    }
};
