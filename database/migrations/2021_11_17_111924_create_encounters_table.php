<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEncountersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encounters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('claim_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('facility_id')->nullable();
            $table->integer('type')->nullable();
            $table->integer('patient_id')->nullable();
            $table->timestamp('start')->nullable();
            $table->timestamp('end')->nullable();
            $table->integer('start_type')->nullable();
            $table->integer('end_type')->nullable();
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
        Schema::dropIfExists('encounters');
    }
}
