<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateNcsJobDispatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ncs_job_dispatches', function (Blueprint $table) {
            $table->id();
            
            // $table->integer('random_number');
            $table->integer('JobReferenceID');
            $table->string('JobTitle');
            $table->string('JobDescription');
            $table->foreignId('sector');
            $table->foreignId('industry');
            $table->integer('NumberofOpenings');
            $table->string('jobnatures_code');
            $table->foreignId('jobnatures_id');
            $table->foreignId('qualifications');

            $table->string('ContactPersonName');
            $table->string('ContactMobile');
            $table->string('ContactEmail'); //new

            $table->string('skill1');
            $table->string('skill2');
            $table->date('JobPostExpiryDate');
            $table->boolean('published')->default(1);
            
            $table->string('PostedForEmployer');
            $table->string('MinExpectedSalary'); //new
            $table->string('MaxExpectedSalary');   //new



            $table->timestamps();
        });


         // Generate random numbers and insert them into the table
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ncs_job_dispatches');
    }
}
