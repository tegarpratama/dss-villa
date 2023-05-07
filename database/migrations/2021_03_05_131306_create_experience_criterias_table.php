<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperienceCriteriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hygiene_criterias', function (Blueprint $table) {
            $table->id();
            $table->enum('linguistic_value', ['Sangat Kotor', 'Kotor', 'Cukup', 'Bersih', 'Sangat Bersih']);
            $table->float('score');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hygiene_criterias');
    }
}
