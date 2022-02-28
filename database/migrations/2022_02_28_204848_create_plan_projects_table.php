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
            $table->string('description')->nullable();
            $table->string('process_type');
            $table->string('category');
            $table->string('procurement_method');
            $table->string('estimate_cost');
            $table->string('gl_code')->nullable();
            $table->string('programme')->nullable();
            $table->string('sub_programme')->nullable();
            $table->string('quantities')->nullable();
            $table->string('source_of_funds')->nullable();
            $table->string('asset_location')->nullable();
            $table->string('justification');
            $table->string('feasibility_studies')->nullable();
            $table->string('awarding_authority');
            $table->string('budgetary_provision_in_naira');
            $table->string('preparation_of_designs')->nullable();
            $table->string('preparation_of_tender_documents');
            $table->string('issued_no_objection_certificate');
            $table->string('date_of_accounting_officer_approval')->nullable();
            $table->string('contract_type')->nullable();
            $table->string('project_commencement_date')->nullable();
            $table->string('date_of_psst_approval')->nullable();
            $table->string('advertisement_date')->nullable();
            $table->string('bid_closing_opening_date')->nullable();
            $table->string('approval_of_evaluation_report')->nullable();
            $table->string('award_notification_date')->nullable();
            $table->string('contract_signing_date')->nullable();
            $table->string('completion_date')->nullable();
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
