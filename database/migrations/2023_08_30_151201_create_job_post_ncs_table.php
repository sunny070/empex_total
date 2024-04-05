<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobPostNcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_post_ncs', function (Blueprint $table) {
            $table->id();
            // $table->string('job_reference_id');

            $table->string('category_id');
            $table->string('type_id');
            $table->string('sector_id')->nullable();
            $table->string('title');
            $table->string('slug')->nullable(); // Add a unique slug column
            $table->longText('description');
            $table->string('no_of_post');
            $table->date('due_date_of_submission');
            $table->string('organization_name')->nullable();
            $table->string('department_id')->nullable();
            $table->string('created_by'); // ref: admin_id (creator)
            $table->boolean('published')->default(0);
            $table->decimal('min_expected_salary', 20, 2);
            $table->decimal('max_expected_salary', 20, 2);
            $table->string('contact_person_name');
            $table->string('contact_mobile');
            $table->string('contact_email');
            $table->string('job_locations');
            $table->string('url')->nullable();
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
        Schema::dropIfExists('job_post_ncs');
    }
}
