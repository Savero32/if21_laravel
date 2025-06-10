<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasUuids;
    protected $fillable = ['nama', 'npm', 'jk', 'tanggal_lahir', 'tempat_lahir', 'asal_sma', 'foto','prodi_id'];

    public function prodi()
    {
        return $this->belongsTo(prodi::class, 'prodi_id', 'id');
    }
}
