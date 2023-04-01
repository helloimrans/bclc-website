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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();

            $table->string('course_id');
            $table->string('title')->unique();
            $table->double('fee')->nullable();
            $table->string('discount_type')->nullable();
            $table->double('discount')->nullable();
            $table->double('discount_fee')->nullable();
            $table->string('active_fee')->nullable();
            $table->string('slug')->unique();
            $table->bigInteger('service_category_id')->unsigned();
            $table->bigInteger('service_id')->unsigned();
            $table->string('duration')->nullable();
            $table->bigInteger('expert_id')->unsigned()->nullable();
            $table->json('schedule')->nullable();
            $table->json('suitable_course')->nullable();
            $table->string('venue')->nullable();
            $table->date('class_start_date')->nullable();
            $table->date('class_end_date')->nullable();
            $table->time('class_start_time')->nullable();
            $table->time('class_end_time')->nullable();
            // $table->integer('total_hours')->nullable();
            $table->float('total_hours')->nullable();
            $table->enum('hour_minute', [1, 2])->default(2)->nullable();
            $table->date('last_reg_date')->nullable();
            $table->string('provide_certificate')->nullable();
            $table->text('short_description')->nullable();
            $table->text('key_takeaways')->nullable();
            $table->longText('curriculum')->nullable();
            $table->string('meeting_link')->nullable();
            $table->string('image')->nullable();
            $table->string('home_slider')->nullable();
            $table->string('boarding')->nullable();
            $table->string('comming_soon')->nullable();

            $table->boolean('status')->nullable()->default(1);
            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->bigInteger('updated_by')->unsigned()->nullable();
            $table->bigInteger('deleted_by')->unsigned()->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
};