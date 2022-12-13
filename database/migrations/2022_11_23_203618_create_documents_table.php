<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('type_id');
            $table->date('date_doc');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->string('description')->nullable();
            $table->timestamp('uploaded_at')->nullable();  // timestamp tanpa (s) adalah tipe data timestamp
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('documents');
    }
}
