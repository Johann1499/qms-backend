<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveUniqueFromStudentNumber extends Migration
{
    public function up()
    {
        Schema::table('queues', function (Blueprint $table) {
            // Remove the unique constraint from the student_number column
            $table->dropUnique(['student_number']);
        });
    }

    public function down()
    {
        Schema::table('queues', function (Blueprint $table) {
            // Reapply the unique constraint if rolling back
            $table->unique('student_number');
        });
    }
}
