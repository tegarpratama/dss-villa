<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMajorCriteriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_criterias', function (Blueprint $table) {
            $table->id();
            $table->enum('linguistic_value', ['Rp500.000 - Rp999.000', 'Rp1.000.000 - Rp1.499.000', 'Rp1.500.000 - Rp.1.999.000', 'Rp2.000.000 - Rp2.499.000', 'Rp2.500.000 - Rp3.000.000']);
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
        Schema::dropIfExists('price_criterias');
    }
}
