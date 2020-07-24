<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\File;
use App\User;

class CreateModelFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(File::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->string(File::FIELD_NAME);
            $table->string(File::FIELD_TYPE);
            $table->string(File::FIELD_NAME_SAVED);
            $table->string(File::FIELD_TITLE)->nullable();
            $table->string(File::FIELD_DESCRIPTION)->nullable();
            $table->string(File::FIELD_TAGS)->nullable();
            $table->unsignedBigInteger(File::FIELD_ID_USER)->nullable();
            $table->foreign(File::FIELD_ID_USER)->references(File::FIELD_ID)->on(User::TABLE_NAME);
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
        Schema::dropIfExists(File::TABLE_NAME);
    }
}
