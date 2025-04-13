<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rating; // Pastikan Rating sudah di-import


class Pengaduan extends Model
{
    use HasFactory;
    protected $table = 'pengaduan';

    // Primary key dari tabel
    protected $primaryKey = 'idpengaduan';

    // Disable auto-increment karena idpengaduan bukan tipe integer
    public $incrementing = false;

    // Tipe data primary key
    protected $keyType = 'string';

    // Kolom-kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'idpengaduan',
        'nama_fasilitas',
        'nama_barang',
        'gambar',
        'deskripsi_keluhan',
        'tanggal_aduan',
        'lokasi',
        'status_pengaduan',
    ];

    // Menonaktifkan timestamps jika tidak ingin menggunakan created_at dan updated_at
    public $timestamps = true;
    public function rating()
{
    return $this->hasMany(Rating::class, 'idpengaduan', 'idpengaduan');
}

}

