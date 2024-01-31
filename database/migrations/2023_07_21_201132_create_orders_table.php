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
            $table->foreignId('user_id');
            $table->text('cart');
            $table->string('charge_id');
            $table->string('flw_ref');
            $table->string('app_fee');
            $table->string('transaction_id');
            $table->string('transaction_number');
            $table->string('payment_status');
            $table->string('payment_method');
            $table->string('txnid');
            $table->float('amount', 8, 2);
            $table->string('order_number');
            $table->string('charged_amount');
            $table->string('processor_response');
            $table->string('status')->default('pending');
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
