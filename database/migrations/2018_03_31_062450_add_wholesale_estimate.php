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
        Schema::create('wholesale_exits', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index('wholesale_exits_user_id');
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users');
            $table->bigInteger('property_id')->index('wholesale_exits_property_id');
            $table->foreign('property_id')
                  ->references('id')
                  ->on('properties');
            $table->integer('how_quick_to_sell')->nullable();
            $table->float('arv');
            $table->float('rent_arv')->nullable();
            $table->float('estimated_repairs');
            $table->float('assignment_fee');
            $table->float('mortgage_amount')->nullable();
            $table->float('monthly_payment')->nullable();
            $table->float('asking_price');
            $table->string('deal_type')->nullable();
            $table->text('buyers')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('properties', function (Blueprint $table) {
            $table->boolean('hasWholesaleExit')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wholesale_exits');
        Schema::table('properties', function (Blueprint $table) {
            $table->dropColumn('hasWholesaleExit');
        });
    }
}
