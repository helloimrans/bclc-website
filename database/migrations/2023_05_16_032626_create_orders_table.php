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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->nullable();

            $table->string('invoice_no')->nullable();
            $table->string('purpose_of_payment')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('account_number')->nullable();
            $table->string('user_account_number')->nullable();

            $table->double('amount',8,2)->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('currency')->default('BDT')->nullable();
            $table->enum('status',['Pending','Processing','Complete'])->default('Pending')->nullable();
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
        Schema::dropIfExists('orders');
    }
};
