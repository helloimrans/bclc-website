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
        Schema::create('office_functions', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('office_category_id')->unsigned();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('service')->nullable();
            $table->string('ministry_dept_authority')->nullable();
            $table->string('address')->nullable();
            $table->string('contact_info')->nullable();
            $table->string('source_link')->nullable();
            $table->string('file')->nullable();

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
        Schema::dropIfExists('office_functions');
    }
};
