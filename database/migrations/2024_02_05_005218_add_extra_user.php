<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExtraUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        $this->down();
        Schema::table('assets', function (Blueprint $table) {
            $table->unsignedInteger('extra_user')->nullable()->after('assigned_to');
            $table->foreign('extra_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('assets', 'extra_user')) {
            Schema::table('assets', function (Blueprint $table) {
                //$table->dropForeign(['extra_user']);
                $table->dropColumn('extra_user');
            });
        }
    }
}
