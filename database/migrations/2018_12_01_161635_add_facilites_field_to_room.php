<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFacilitesFieldToRoom extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rooms', function($table) {
            $table->string('chairs')->nullable();
            $table->string('wifi')->nullable();
            $table->string('ac')->nullable();
            $table->string('coffee')->nullable();
            $table->string('toilet')->nullable();
            $table->string('projector')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rooms', function($table) {
            $table->dropColumn('chairs');
            $table->dropColumn('wifi');
            $table->dropColumn('ac');
            $table->dropColumn('coffee');
            $table->dropColumn('toilet');
            $table->dropColumn('projector');
        });
    }
}
