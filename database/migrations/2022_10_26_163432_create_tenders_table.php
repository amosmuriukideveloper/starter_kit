<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenders', function (Blueprint $table) {
            $table->id();
            $table->string('tender_name', 200);
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->text('description');
            $table->integer('price');
            $table->integer('delivery_type_id');
            $table->dateTime('delivery_date');
            $table->integer('status_id');
            $table->string('file_name');
            $table->foreignId('won_by')->constrained('users');
            $table->foreignId('created_by')->constrained('users');

            
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
        Schema::dropIfExists('tenders');
    }
};
