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
        Schema::create('abrwn_categories', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('is_article')->nullable(); // is 1 = article category
            $table->tinyInteger('is_blog')->nullable(); // is 1 = blog category
            $table->tinyInteger('is_review')->nullable(); // is 1 = review category
            $table->tinyInteger('is_writeup')->nullable(); // is 1 = write up category
            $table->tinyInteger('is_news')->nullable(); // is 1 = news category
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->integer('sort')->nullable();
            $table->tinyInteger('status');
            $table->longText('description')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('abrwn_categories');
    }
};
