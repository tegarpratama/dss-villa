<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSecurityCriterias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('security_criterias', function (Blueprint $table) {
            $table->id();
            $table->enum('linguistic_value', ['Sangat Tidak Aman', 'Kurang Aman', 'Cukup Aman', 'Aman', 'Sangat Aman']);
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
        Schema::dropIfExists('security_criterias');
    }
}