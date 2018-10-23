<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->integer('phone');
            $table->string('address');
            $table->string('company');
            $table->string('title');
            $table->text('notes');
            $table->text('meetings');
            $table->text('opportunities');
            $table->integer('user_id');
            $table->string('prefered_notification_method');
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
        Schema::dropIfExists('Contacts');
    }
}
