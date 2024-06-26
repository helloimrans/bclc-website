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
        Schema::table('write_ups', function (Blueprint $table) {
            $table->date('last_update')->nullable()->after('thumbnail_image');
            $table->boolean('is_home_slider')->default(false)->after('last_update');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('write_ups', function (Blueprint $table) {
            $table->dropColumn('last_update');
            $table->dropColumn('is_home_slider');
        });
    }
};
