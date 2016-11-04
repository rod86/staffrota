<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffRotaSlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_rota_slots', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rota_id');
	        $table->tinyInteger('day_number');
	        $table->integer('staff_id')->nullable();
	        $table->string('slot_type', 20);
	        $table->time('start_time')->nullable();
	        $table->time('end_time')->nullable();
	        $table->float('work_hours', 4, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('staff_rota_slots');
    }
}
