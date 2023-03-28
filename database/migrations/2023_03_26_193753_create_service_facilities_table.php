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
        Schema::create('service_facilities', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('service_facility_category_id')->unsigned();
            $table->string('service')->nullable();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('authority')->nullable();
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
        Schema::dropIfExists('service_facilities');
    }
};
