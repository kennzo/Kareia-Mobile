<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddWholesaleEstimate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wholesale_exit', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('property_id')->index('wholesale_exit_property_id');
            $table->foreign('property_id')
                  ->references('id')
                  ->on('properties');
            $table->float('arv');
            $table->float('estimated_repairs');
            $table->float('assignment_fee');
            $table->string('deal_type')->nullable();
            $table->text('buyers')->nullable();
            $table->text('notes')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wholesale_exit');
    }
}
