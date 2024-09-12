<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('career_applications', function (Blueprint $table) {
            $table->dropColumn('upload_attachment'); // Drop the old column
            $table->string('file_path'); // Add new columns
            $table->string('file_name');
        });
    }

    public function down()
    {
        Schema::table('career_applications', function (Blueprint $table) {
            $table->binary('upload_attachment')->nullable(); // Restore the old column
            $table->dropColumn('file_path'); // Drop new columns
            $table->dropColumn('file_name');
        });
    }
};
