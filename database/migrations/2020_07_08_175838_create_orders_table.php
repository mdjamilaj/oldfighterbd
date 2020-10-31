<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
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
            $table->string('name');
            $table->integer('buy_price');
            $table->integer('sale_price');
            $table->integer('package_id');
            $table->integer('refoundamount')->nullable();
            $table->enum('status', array('pandding', 'complete', 'cancel'));
            $table->integer('user_id');
            $table->string('type');
            $table->integer('transaction_id')->nullable();
            $table->string('payment_number')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('payment')->nullable();
            $table->string('email');
            $table->string('password');
            $table->string('security_code')->nullable();
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
}
