<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cetak_Laporan extends Model
{
    use HasFactory;
    protected $table = 'cetak_laporan';

    // Primary key dari tabel
    protected $primaryKey = 'idpengaduan';

    // Disable auto-increment karena idpengaduan bukan tipe integer
    public $incrementing = false;

    // Tipe data primary key
    protected $keyType = 'string';

    // Kolom-kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'idpengaduan',
        'nama_lengkap',
        'kategori_pengaduan',
        'tanggal_pengaduan',
        'nama_barang',
        'gambar',
        'deskripsi',
    ];

    // Menonaktifkan timestamps jika tidak ingin menggunakan created_at dan updated_at
    public $timestamps = true;

}
