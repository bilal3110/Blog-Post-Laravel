<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            // Make sure the column exists
            if (!Schema::hasColumn('posts', 'category_id')) {
                $table->unsignedBigInteger('category_id');
            }
            
            // Add the foreign key constraint
            $table->foreign('category_id')
                  ->references('cid')
                  ->on('category')
                  ->onDelete('cascade'); // Optional: specify what happens on delete
        });
    }

    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            // Drop the foreign key constraint and the column
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });
    }
};
