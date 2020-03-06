<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\Builder;
use Illuminate\Support\Facades\Schema;

class CreateWagerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wager', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('total_wager_value', 14, 2);
            $table->decimal('odds', 14, 2);
            $table->decimal('selling_percentage', 5, 2);
            $table->decimal('selling_price', 14, 2);
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
        Schema::dropIfExists('wager');
    }
}
