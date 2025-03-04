<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    protected $table = 'jurusans'; // Pastikan sesuai dengan nama tabel
    protected $primaryKey = 'jurusan_id'; // Sesuaikan dengan primary key di database
    public $timestamps = true; // Jika pakai created_at & updated_at

    protected $fillable = [
        'nama_jurusan', // Sesuaikan dengan kolom di database
        'kuota',
    ];

    public function masihTersedia()
    {
        return $this->kuota > 0;
    }

}
