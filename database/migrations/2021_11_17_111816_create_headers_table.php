<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('headers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('submission_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('sender_id')->nullable();
            $table->string('receiver_id')->nullable();
            $table->timestamp('transaction_date')->nullable();
            $table->integer('record_count')->nullable();
            $table->string('disposition_flag')->nullable();
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
        Schema::dropIfExists('headers');
    }
}
