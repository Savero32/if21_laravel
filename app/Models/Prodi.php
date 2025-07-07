<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';
    
    use HasUuids;
    protected $table = 'prodi';

    protected $fillable = ['nama', 'singkatan', 'kaprodi', 'sekretaris', 'fakultas_id'];

    public function fakultas() {
        return $this->belongsTo(Fakultas::class, 'fakultas_id', 'id');
    }

    public function mataKuliah()
    {
        return $this->hasMany(MataKuliah::class);
    }
}