<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOpinionFielsToAdvertiementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('opinion')->default(0);
            $table->integer('opinion_foreign')->default(0);
            $table->boolean('opinion_send_pl')->default(false);
            $table->boolean('opinion_send_foreign')->default(false);
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
            $table->dropColumn('opinion');
            $table->dropColumn('opinion_foreign');
            $table->dropColumn('opinion_send_pl');
            $table->dropColumn('opinion_send_foreign');
        });
    }
}
