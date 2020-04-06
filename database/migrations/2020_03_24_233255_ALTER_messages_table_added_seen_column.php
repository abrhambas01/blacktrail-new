<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ALTERMessagesTableAddedSeenColumn extends Migration
{
    /**
     * Run the migrations.
     *  
     * @return void
     */
    public function up()
    {
        Schema::table('messages', function ($table) {
            $table->boolean('read')->after('seen_at');
        });     
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('messages', function ($table) {
            $table->dropColumn('read');
        });  
    }
}
