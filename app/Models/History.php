<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
    protected $table = 'history';

    // Kolom-kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'iduser',
        'action',
        'deskripsi',
    ];

    // Timestamps untuk created_at dan updated_at
    public $timestamps = true;
}
