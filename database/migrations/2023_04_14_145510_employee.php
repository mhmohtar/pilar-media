<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Employee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_karyawan');
            $table->integer('nip')->unique();
            $table->string('jabatan');
            $table->string('departemen');
            $table->date('tanggal_lahir');
            $table->text('alamat');
            $table->string('telepon');
            $table->string('agama');
            $table->integer('status');
            $table->string('profile');
            
            //$table->dropColumn('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('karyawan');
    }
}
