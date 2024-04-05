<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVerifiedApprovedByToBasicInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('basic_infos', function (Blueprint $table) {
            $table->foreignId('verifier_user_id')->cascade();
            $table->date('verified_date')->nullable();
            $table->foreignId('approver_user_id')->cascade();
            $table->date('approved_date')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('basic_infos', function (Blueprint $table) {
            //
        });
    }
}
