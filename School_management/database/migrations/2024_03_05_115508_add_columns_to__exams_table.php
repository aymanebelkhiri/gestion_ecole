<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToExamsTable extends Migration
{
    public function up()
    {
        Schema::table('exams', function (Blueprint $table) {
            $table->string('heur', 45)->nullable();
            $table->string('titre', 45)->nullable();
            $table->string('disc', 60)->nullable();
        });
    }

    public function down()
    {
        Schema::table('exams', function (Blueprint $table) {
            $table->dropColumn('heur');
            $table->dropColumn('titre');
            $table->dropColumn('disc');
        });
    }
}
