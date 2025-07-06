<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedbacks';

    protected $fillable = ['penyaluran_id', 'mitra_id', 'rating', 'komentar'];

    protected $casts = [
        'rating' => 'integer',
    ];

    /**
     * Get the penyaluran that the feedback belongs to.
     */
    public function penyaluran()
    {
        return $this->belongsTo(Penyaluran::class);
    }

    /**
     * Get the mitra that created the feedback.
     */
    public function mitra()
    {
        return $this->belongsTo(Mitra::class);
    }
}
