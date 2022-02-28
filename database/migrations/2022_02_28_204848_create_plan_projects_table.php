<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_projects', function (Blueprint $table) {
            $table->id();
            $table->integer('plan_id');
            $table->integer('user_id');
            $table->string('name');
            $table->string('description');
            $table->string('process_type');
            $table->string('category');
            $table->string('procurement_method');
            $table->string('estimate_cost');
            $table->string('gl_code');
            $table->string('programme');
            $table->string('sub_programme');
            $table->string('quantities');
            $table->string('source_of_funds');
            $table->string('asset_location');
            $table->string('justification');
            $table->string('feasibility_studies');
            $table->string('awarding_authority');
            $table->string('budgetary_provision_in_naira');
            $table->string('preparation_of_designs');
            $table->string('preparation_of_tender_documents');
            $table->string('issued_no_objection_certificate');
            $table->string('date_of_accounting_officer_approval');
            $table->string('contract_type');
            $table->string('project_commencement_date');
            $table->string('date_of_psst_approval');
            $table->string('advertisement_date');
            $table->string('bid_closing_opening_date');
            $table->string('approval_of_evaluation_report');
            $table->string('award_notification_date');
            $table->string('contract_signing_date');
            $table->string('completion_date');
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
        Schema::dropIfExists('plan_projects');
    }
}
