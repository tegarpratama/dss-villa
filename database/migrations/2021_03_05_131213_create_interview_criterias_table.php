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
        Schema::create('interview_criterias', function (Blueprint $table) {
            $table->id();
            $table->integer('min_param');
            $table->integer('max_param');
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
        Schema::dropIfExists('interview_criterias');
    }
}
