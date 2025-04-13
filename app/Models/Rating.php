<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Rating extends Model
{
    use HasFactory;
    protected $table = 'rating';

    // Primary key dari tabel
    protected $primaryKey = 'idrating';

    // Disable auto-increment karena idrating bukan tipe integer
    public $incrementing = false;

    // Tipe data primary key
    protected $keyType = 'string';

    // Kolom-kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'idrating',
        'rating',
        'komentar',
    ];

    // Menonaktifkan timestamps jika tidak ingin menggunakan created_at dan updated_at
    public $timestamps = true;
    public function pengaduan()
    {
        return $this->belongsTo(Pengaduan::class, 'idpengaduan', 'idpengaduan');
    }
    
}
// App\Models\Rating.php

