<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("docs_id");
            $table->longText("value")->nullable();
            $table->timestamps();

            $table->foreign('docs_id')
               ->references('id')
               ->on('docs')
               ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rels');
    }
}
