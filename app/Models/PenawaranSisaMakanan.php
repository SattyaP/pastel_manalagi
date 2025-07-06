<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenawaranSisaMakanan extends Model
{
    use HasFactory;

    protected $table = 'penawaran_sisa_makanan';

    protected $fillable = ['produk_id', 'kuantitas', 'satuan', 'tanggal_penawaran', 'waktu_kadaluarsa', 'status'];

    protected $casts = [
        'tanggal_penawaran' => 'date',
        'waktu_kadaluarsa' => 'datetime',
        'status' => 'string',
    ];

    /**
     * Get the produk that owns the PenawaranSisaMakanan.
     */
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

    /**
     * Get the penyaluran associated with the PenawaranSisaMakanan.
     */
    public function penyaluran()
    {
        return $this->hasOne(Penyaluran::class, 'penawaran_id');
    }
}
