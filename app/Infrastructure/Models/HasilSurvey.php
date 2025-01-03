<?php

namespace App\Infrastructure\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilSurvey extends Model
{
    use HasFactory;
    protected $fillable = [
        'kategori_pred',
        'kategori_man',
        'rekomendasi_pred',
        'rekomendasi_man',
        'catatan',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at'
    ];
}
