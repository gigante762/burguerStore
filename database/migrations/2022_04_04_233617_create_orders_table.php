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
            $table->string('code'); // the code of this order
            $table->string('status');
            $table->string('customer_name');
            $table->string('phone');
            $table->string('payment_method');
            $table->string('total_price');
            $table->text('cart'); // cart text
            $table->text('observations')->nullable();
            $table->string('adress'); // number, street
            $table->string('adress_complement')->nullable();
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
