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
        Schema::create('law_chapters', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('law_id')->unsigned();
            $table->string('chapter_no')->nullable();
            $table->string('chapter_no_bn')->nullable();
            $table->string('title')->nullable();
            $table->string('title_bn')->nullable();
            $table->string('slug')->unique();
            $table->integer('sort')->nullable();
            $table->tinyInteger('is_act')->nullable();
            $table->tinyInteger('is_rules')->nullable();
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
        Schema::dropIfExists('law_chapters');
    }
};
