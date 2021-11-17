<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClaimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('claims', function (Blueprint $table) {
            $table->id();
            $table->foreignId('submission_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->integer('c_id')->nullable();
            $table->string('member_id')->nullable();
            $table->string('payer_id')->nullable();
            $table->string('emirates_id_number')->nullable();
            $table->string('gross')->nullable();
            $table->string('patient_share')->nullable();
            $table->string('net')->nullable();
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
        Schema::dropIfExists('claims');
    }
}
