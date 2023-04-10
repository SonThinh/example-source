<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->uuid('contactable_id');
            $table->string('contactable_type');
            $table->unique(['contactable_id', 'contactable_type']);

            $table->string('postcode')->default('')->index();
            $table->string('city')->default('')->index();
            $table->string('free_dial')->default('')->index();
            $table->string('tel')->default('')->index();
            $table->string('fax')->default('')->index();
            $table->string('email')->default('')->index();
            $table->string('website')->default('')->index();
            $table->text('address')->nullable();
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
        Schema::dropIfExists('contacts');
    }
}
