<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterviewCriteriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location_criterias', function (Blueprint $table) {
            $table->id();
            $table->enum('linguistic_value', ['0 - 499 M', '500 - 999 M', '1 - 1.4 Km', '1.5 - 1.9 Km', '2 - 2.5 Km']);
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
        Schema::dropIfExists('location_criterias');
    }
}
