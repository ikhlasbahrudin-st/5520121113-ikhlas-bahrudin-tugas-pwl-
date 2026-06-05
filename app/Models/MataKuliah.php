<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    use HasFactory;

    protected $table = 'mata_kuliahs';
    protected $fillable = ['kode_mk', 'nama_mk', 'sks', 'semester'];

    public function jadwals()
    {
        return $this->hasMany(Jadwal::class);
    }

    public function krs()
    {
        return $this->hasMany(Krs::class);
    }
}
