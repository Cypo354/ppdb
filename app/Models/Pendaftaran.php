<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = 'pendaftarans'; // Nama tabel di database

    protected $fillable = [
        'jenis_pendaftaran',
        'jurusan_dipilih',
        'nama',
        'jenis_kelamin',
        'nisn',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'kebutuhan_khusus',
        'sekolah_asal',
        'email',
        'alamat_jalan',
        'rt',
        'rw',
        'dusun',
        'kelurahan',
        'kecamatan',
        'kabupaten',
        'kode_pos',
        'skhun',
        'ktp',
        'kk',
        'akta',
        'kip',

    ];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_dipilih', 'jurusan_id');

    }

    public function validasi() {
        return $this->hasOne(Validasi::class, 'pendaftaran_id'); 
    }
}
