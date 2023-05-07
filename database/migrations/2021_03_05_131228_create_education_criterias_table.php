<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationCriteriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facility_criterias', function (Blueprint $table) {
            $table->id();
            $table->enum('linguistic_value', ['Sangat Kurang Lengkap', 'Kurang Lengkap', 'Cukup Lengkap', 'Lengkap', 'Sangat Lengkap']);
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
        Schema::dropIfExists('facility_criterias');
    }
}
