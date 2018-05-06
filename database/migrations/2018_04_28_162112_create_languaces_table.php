<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLanguacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languaces', function (Blueprint $table) {
            $table->increments('id');
            $table->string('language_family',128)->default('');
            $table->string('language_name',128)->default('');
            $table->string('native_name',128)->default('');
            $table->string('iso_639_1',2)->default('');
            $table->string('iso_639_2t',3)->default('');
            $table->string('iso_639_2b',3)->default('');
            $table->string('iso_639_3',3)->default('');
            $table->string('iso_639_6',4)->default('');
            $table->string('notes',100)->default('');
            $table->tinyInteger('is_default')->default('0');
            $table->tinyInteger('is_visible')->default('0');
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
        Schema::dropIfExists('languaces');
    }
}
