<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('order_id');
            $table->string('reference_id')->nullable();
            $table->integer('application_id');
            $table->integer('service_id');
            $table->string('service_type');
            $table->float('amount', 10, 2);
            $table->float('service_charge', 10, 2)->nullable();
            $table->float('total_amount', 10, 2)->nullable();
            $table->boolean('status')->default(false);
            $table->longtext('token')->nullable();
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
        Schema::dropIfExists('payments');
    }
}
