<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_documents', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('registration_id');
            $table->integer('registration_category_id'); //integer
            $table->string('attachment_1');
            $table->string('attachment_2');
            $table->string('attachment_3');
            $table->string('attachment_4');
            $table->string('attachment_5');
            $table->string('attachment_6');
            $table->string('attachment_7');
            $table->string('attachment_8');
            $table->string('attachment_9');
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
        Schema::dropIfExists('category_documents');
    }
}
