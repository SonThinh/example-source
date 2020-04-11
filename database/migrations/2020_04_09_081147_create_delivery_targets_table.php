<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryTargetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_targets', function (Blueprint $table) {
            $table->id();
            $table->uuid('post_id')->unique();
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->uuid('prefecture_id')->nullable();
            $table->foreign('prefecture_id')->references('id')->on('prefectures')->onDelete('set null');
            $table->uuid('company_id')->nullable();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('set null');
            $table->uuid('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('delivery_targets');
    }
}
