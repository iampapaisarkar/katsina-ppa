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
            $table->integer('user_id');
            $table->integer('registration_id')->nullable();
            $table->integer('area_of_core_competence'); //integer
            $table->integer('type_of_organization'); //integer
            $table->string('company_name');
            $table->string('cac_number');
            $table->date('date_of_incorporation');
            $table->string('share_capital'); // float
            $table->string('address');
            $table->string('landmark');
            $table->string('city');
            $table->string('state'); //string
            $table->integer('country'); //integer
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
