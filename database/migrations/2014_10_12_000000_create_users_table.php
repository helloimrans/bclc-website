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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('user_type', ['normal_user', 'admin', 'expert'])->default('normal_user');
            $table->string('email')->unique();
            $table->string('mobile')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('photo')->nullable();
            $table->date('dob')->nullable();
            $table->enum('gender', ['Male', 'Female', 'Others'])->nullable();
            $table->enum('marital_status', ['Married', 'Unmarried'])->nullable();
            $table->text('about')->nullable();
            $table->string('designation')->nullable();
            $table->string('workplace_name')->nullable();
            $table->text('address')->nullable();

            $table->boolean('is_lawyer')->default(false);
            $table->boolean('is_consultant')->default(false);
            $table->boolean('is_trainer')->default(false);
            $table->boolean('is_writer')->default(false);

            $table->boolean('is_approved')->default(0);
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('users');
    }
};
