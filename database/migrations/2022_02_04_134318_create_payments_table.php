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
            $table->integer('registration_id');
            $table->integer('service_id');
            $table->integer('extra_service_id')->nullable();
            $table->string('service_type');
            $table->float('amount', 10, 2);
            $table->float('service_charge', 10, 2)->nullable();
            $table->float('total_amount', 10, 2)->nullable();
            $table->string('status')->default('unpaid'); // paid, unpaid, pending, queried
            $table->longtext('token')->nullable();
            $table->boolean('is_online')->default(false);
            $table->string('evidence_of_payment')->nullable();
            $table->date('payment_date')->nullable();
            $table->string('payment_method')->nullable();
            $table->longtext('query')->nullable();
            $table->integer('query_by')->nullable();
            $table->integer('approve_by')->nullable();
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
