<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 45);
            $table->date('ttl');
            $table->enum('jenis_kelamin', ['Laki-Laki','Perempuan']);
            $table->text('alamat');
            $table->string('pekerjaan', 45);
            $table->unsignedBigInteger('id_user');

            $table->foreign('id_user')->references('id')->on('user')->onDelete('cascade');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profile');
    }
}
