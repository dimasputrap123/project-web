<?php

namespace App\Infrastructure\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kpm extends Model
{
    use HasFactory;
    protected $fillable = ['nik','nama','alamat','status','updated_by'];
}
