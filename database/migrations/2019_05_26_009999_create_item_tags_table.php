<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('tag_id');
            $table->foreign('item_id')
                ->references('id')
                ->on('items');
            $table->foreign('tag_id')
                ->references('id')
                ->on('tags');
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
        Schema::dropIfExists('item_tags');
    }
}
