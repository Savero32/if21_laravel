<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';
    protected $fillable = ['mata_kuliah_id', 'sesi_id', 'ruang', 'hari', 'jam_mulai', 'jam_selesai'];

    public function mataKuliah() {
        return $this->belongsTo(MataKuliah::class, 'mata_kuliah_id');
    }
    public function sesi() {
        return $this->belongsTo(Sesi::class, 'sesi_id');
    }
}
