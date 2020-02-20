<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->char('height',3)->nullable()->after('password');
            $table->char('weight',3)->nullable()->after('password');
            $table->string('comment')->nullable()->after('password');
            $table->boolean('delete_flg')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('height');
            $table->dropColumn('weight');
            $table->dropColumn('comment');
            $table->dropColumn('delete_flg');

        });
    }
}
