<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->string('logo')->nullable();
            $table->string('name')->nullable();

            $table->string('whatsapp')->nullable();
            $table->string('phone_first')->nullable();
            $table->string('phone_second')->nullable();
            $table->string('fax_first')->nullable();
            $table->string('fax_second')->nullable();

            $table->text('emails')->nullable();
            $table->text('address')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('youtube')->nullable();
            $table->longText('footer')->nullable();


            $table->longText('head_script')->nullable();
            $table->longText('body_script')->nullable();

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
}
