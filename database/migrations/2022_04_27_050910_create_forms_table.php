<?php

use App\Enums\FormEnum;
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
        Schema::create('forms', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('doctor_id')->nullable();
            $table->unsignedInteger('direction_id')->nullable();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->text('content')->nullable();
            $table->text('referer')->nullable();
            //$table->text('source_url')->nullable();
            //$table->text('source_title')->nullable();
            //$table->string('clinic')->nullable();
            //$table->string('direction')->nullable();
            $table->boolean('form')->default(FormEnum::FEEDBACK);

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
        Schema::dropIfExists('forms');
    }
};
