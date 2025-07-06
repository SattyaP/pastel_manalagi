<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyaluran extends Model
{
    use HasFactory;

    protected $table = 'penyalurans';

    protected $fillable = ['penawaran_id', 'mitra_id', 'kuantitas_diterima', 'tanggal_penyaluran', 'status_pengiriman', 'catatan'];

    protected $casts = [
        'tanggal_penyaluran' => 'datetime',
        'status_pengiriman' => 'string',
    ];

    /**
     * Get the mitra that received the Penyaluran.
     */
    public function mitra()
    {
        return $this->belongsTo(Mitra::class);
    }

    /**
     * Get the offering that this penyaluran belongs to.
     */
    public function penawaranSisaMakanan()
    {
        return $this->belongsTo(PenawaranSisaMakanan::class, 'penawaran_id');
    }

    /**
     * Get the feedback associated with the Penyaluran.
     */
    public function feedback()
    {
        return $this->hasOne(Feedback::class);
    }
}
