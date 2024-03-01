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
        Schema::create('abrwns', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('is_abrwn')->comment('1=article,2=blog,3=review,4=writeup,5=news');
            $table->bigInteger('abrwn_category_id')->unsigned();
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->longText('description');
            $table->string('thumbnail_image')->nullable();
            $table->tinyInteger('status');
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
        Schema::dropIfExists('abrwns');
    }
};
