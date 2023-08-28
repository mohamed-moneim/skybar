<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->integer("rid");
            $table->boolean("food")->default(1);
            $table->boolean("bar")->default(1);
            $table->boolean("shisha")->default(1);
            $table->boolean("event")->default(1);
            $table->boolean("table")->default(1);
            $table->boolean("offer")->default(1);
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
        Schema::dropIfExists('settings');
    }
};
