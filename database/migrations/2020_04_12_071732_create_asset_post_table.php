<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_post', function (Blueprint $table) {
            $table->unsignedBigInteger('asset_id');
            $table->foreign('asset_id')->references('id')->on('assets')->onDelete('cascade');
            $table->uuid('post_id');
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->string('group')->index()->default(null);
            $table->primary(['asset_id', 'post_id', 'group']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asset_post');
    }
}
