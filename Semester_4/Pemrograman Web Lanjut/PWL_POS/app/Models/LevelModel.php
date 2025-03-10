<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevelModel extends Model
{
    use HasFactory;

    protected $table = 'm_level'; // Pastikan sesuai dengan tabel di database
    protected $primaryKey = 'level_id'; // Pastikan sesuai dengan primary key

    protected $fillable = ['level_id', 'nama_level']; // Sesuaikan dengan kolom di database
}
