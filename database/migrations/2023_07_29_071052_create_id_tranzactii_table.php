<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdTranzactiiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('id_tranzactii', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('tranzactie_id');
            $table->foreign('tranzactie_id')->references('id')->on('tranzactii');

            $table->unsignedBigInteger('produs_id');
            $table->foreign('produs_id')->references('id')->on('produs');

            $table->integer('cantitate');

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
        Schema::dropIfExists('id_tranzactii');
    }
}
