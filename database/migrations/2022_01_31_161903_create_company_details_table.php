<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_details', function (Blueprint $table) {
            $table->id();
            $table->integer('registration_id');
            $table->integer('area_of_core_competence');
            $table->integer('type_of_organization');
            $table->string('company_name');
            $table->string('cac_number');
            $table->date('default');
            $table->float('share_capital');
            $table->string('address');
            $table->string('landmark');
            $table->string('city');
            $table->integer('state');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone_number');
            $table->string('position');
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
        Schema::dropIfExists('company_details');
    }
}
