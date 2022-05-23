<?php

use App\Enums\ReviewsEnum;
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
        Schema::create('reviews', function (Blueprint $table)
        {

            $table->increments('id');
            $table->unsignedInteger('clinic_id')->nullable();
            $table->unsignedInteger('doctor_id')->nullable();
            $table->string('fio')->nullable(false);
            $table->string('phone')->nullable();
            $table->text('content')->nullable(false);
            $table->longText('answer')->nullable();
            $table->string('original')->nullable();
            $table->boolean('is_active')->default(0);
            $table->boolean('type')->default(ReviewsEnum::POSITIVE);

            $table->foreign('clinic_id', 'fk_reviews_clinic_id')->references('id')->on('clinics')
                ->onDelete('cascade');
            $table->foreign('doctor_id', 'fk_reviews_doctor_id')->references('id')->on('doctors')
                ->onDelete('cascade');

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
        Schema::dropIfExists('reviews');
    }
};
