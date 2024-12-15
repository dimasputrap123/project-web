<?php

namespace App\Infrastructure\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterAsesmen extends Model
{
    use HasFactory;
    protected $fillable = ['pertanyaan', 'status', 'pertanyaan_slug'];
}
