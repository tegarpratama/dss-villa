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
        Schema::create('education_criterias', function (Blueprint $table) {
            $table->id();
            $table->string('education');
            $table->enum('linguistic_value', ['Sangat Rendah', 'Rendah', 'Cukup', 'Baik', 'Sangat Baik']);
            $table->float('score');
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
        Schema::dropIfExists('education_criterias');
    }
}
