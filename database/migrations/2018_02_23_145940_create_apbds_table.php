<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApbdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apbds', function (Blueprint $table) {
            $table->increments('id');
			$table->string('tahun', 20);
			$table->string('kd_kec', 10);
			$table->string('nama_kecamatan', 100);
			$table->string('kd_desa', 10);
			$table->string('nama_desa', 100);
			$table->string('kd_bid', 10);
			$table->string('nama_bidang', 100);
			$table->string('kd_keg', 15);
			$table->string('nama_kegiatan', 100);
			$table->string('kd_rincian', 15);
			$table->string('jns_belanja', 10);
			$table->string('nama_jenis', 100);
			$table->string('nama_obyek', 100);
			$table->double('anggaran_rinc');
			$table->double('jumlah_anggaran');
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
        Schema::dropIfExists('apbds');
    }
}
