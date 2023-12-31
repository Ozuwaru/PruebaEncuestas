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
        Schema::create('encuestas', function (Blueprint $table) {
            $table->id();
            $table->string('Correo');
            $table->tinyInteger('Edad');
            $table->tinyInteger('Sexo');
            $table->smallInteger('RedFavorita');
            $table->float('tFacebook');
            $table->float('tWhatsapp');
            $table->float('tTwitter');
            $table->float('tInstagram');
            $table->float('tTiktok');
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
        Schema::dropIfExists('encuestas');
    }
};
