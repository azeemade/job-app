<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('job_title');
            $table->string('job_description', 250);
            $table->string('company_name');
            $table->string('company_location');
            $table->string('job_requirements', 1000);
            $table->enum('job_types', ['Full-time', 'Temporary', 'Contract', 'Permanent', 'Internship', 'Volunteer']);
            $table->enum('work_conditions', ['Remote', 'Part-remote', 'On-premise']);
            $table->enum('job_categories', ['Tech', 'Health care', 'Hospitality', 'Customer service', 'Marketing']);
            $table->double('job_salary');
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
        Schema::dropIfExists('jobs');
    }
}
