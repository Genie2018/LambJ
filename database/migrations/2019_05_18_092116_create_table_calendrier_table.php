<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCalendrierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_calendrier', function (Blueprint $table) {
            $table->increments('calendrier_id');
            $table->string('lutteur1');
            $table->string('lutteur2');
            $table->integer('promoteur_id');
            $table->string('stade');
            $table->string('date');
            $table->integer('publication_status');

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
        Schema::dropIfExists('table_calendrier');
    }
}
