<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sesi extends Model
{
    protected $fillable = ['nama'];

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class);
    }
}
