<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = ['nim', 'nama_mahasiswa', 'prodi', 'semester', 'email', 'no_hp', 'alamat'];

    public function krs()
    {
        return $this->hasMany(Krs::class);
    }
}
