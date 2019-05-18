<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLutteurTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_lutteur', function (Blueprint $table) {
            $table->increments('lutteur_id');
            $table->string('lutteur_nom');
            $table->integer('ecurie_id');       
            $table->string('lutteur_combat');
            $table->string('lutteur_victoire');
            $table->string('lutteur_defaite');
            $table->string('lutteur_nul');
            $table->string('lutteur_image');            
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
        Schema::dropIfExists('table_lutteur');
    }
}
