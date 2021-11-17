<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('claim_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->integer('a_id')->nullable();
            $table->timestamp('start')->nullable();
            $table->integer('type')->nullable();
            $table->integer('code')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('net')->nullable();
            $table->string('clinician')->nullable();
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
        Schema::dropIfExists('activities');
    }
}
