<?php

use App\Enums\DoctorEnum;
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
        Schema::create('doctors', function (Blueprint $table)
        {

            $table->increments('id');
            $table->string('code')->nullable()->index('idx_doctors_code');
            $table->string('slug')->nullable();
            $table->string('name')->nullable();
            $table->string('excerpt')->nullable();
            $table->longText('content')->nullable();
            $table->string('image')->nullable();
            $table->text('video')->nullable();
            $table->string('experience')->nullable();
            $table->string('category')->nullable();
            $table->boolean('is_call_home')->default(DoctorEnum::NO);
            $table->string('degree')->nullable();
            $table->boolean('is_active')->default(1);
            $table->boolean('is_top')->default(0);
            $table->unsignedSmallInteger('order')->nullable();

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
        Schema::dropIfExists('doctors');
    }
};
