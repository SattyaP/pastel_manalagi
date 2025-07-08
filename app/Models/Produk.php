<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produks';

    protected $fillable = ['nama_produk', 'deskripsi', 'harga', 'foto_produk'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'harga' => 'decimal:2',
    ];

    /**
     * Get all of the offerings for the Produk.
     */
    public function penawaranSisaMakanan()
    {
        return $this->hasMany(PenawaranSisaMakanan::class);
    }

    public function getFotoProdukAttribute($value)
    {
        if ($value && Storage::disk('public')->exists($value)) {
            return asset('storage/' . $value);
        }

        return 'https://via.placeholder.com/150?text=No+Image';
    }

    /**
     * Get the penyaluran associated with the Produk.
     */
    public function penyaluran()
    {
        return $this->hasMany(Penyaluran::class, 'produk_id');
    }
}
