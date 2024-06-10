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
        Schema::create('laws', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('law_category_id')->unsigned();
            $table->string('title')->unique();
            $table->string('short_form')->nullable();
            $table->string('slug')->unique();
            $table->string('link')->nullable();
            $table->string('act_no')->nullable();
            $table->string('act_year')->nullable();
            $table->string('act_date')->nullable();
            $table->string('last_amendment')->nullable();

            $table->string('rules_no')->nullable();
            $table->string('rules_title')->nullable();
            $table->string('rules_short_form')->nullable();
            $table->string('rules_year')->nullable();
            $table->string('rules_date')->nullable();
            $table->string('rules_last_amendment')->nullable();

            $table->string('rules_total_part')->nullable();
            $table->string('rules_total_chapter')->nullable();
            $table->string('rules_total_section')->nullable();
            $table->string('rules_total_schedule')->nullable();
            $table->string('rules_total_form')->nullable();
            $table->longText('rules_description')->nullable();

            $table->string('total_part')->nullable();
            $table->string('total_chapter')->nullable();
            $table->string('total_section')->nullable();
            $table->string('total_schedule')->nullable();
            $table->string('total_form')->nullable();

            $table->longText('description')->nullable();
            $table->string('total_views')->default(0);
            $table->enum('format', ['part_chapter_section', 'part_section','chapter_section'])->nullable()->default(['part_chapter_section']);

            $table->enum('lang', ['en', 'bn','both'])->nullable()->default(['en']);
            $table->enum('default_lang', ['en', 'bn'])->nullable()->default(['en']);
            $table->integer('sort')->nullable();
            $table->tinyInteger('is_rules')->default(0);
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
        Schema::dropIfExists('laws');
    }
};
