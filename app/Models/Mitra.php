<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Mitra extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $guard = 'mitra';

    protected $table = 'mitras';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nama_mitra', 'penanggung_jawab', 'email', 'password', 'nomor_telepon', 'alamat_lengkap', 'kota', 'status_verifikasi', 'dokumen_verifikasi'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = ['password'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
        'status_verifikasi' => 'string', // Cast ENUM to string
    ];

    /**
     * Get all of the distributions for the Mitra.
     */
    public function penyalurans()
    {
        return $this->hasMany(Penyaluran::class);
    }

    /**
     * Get all of the feedbacks for the Mitra.
     */
    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }
}
