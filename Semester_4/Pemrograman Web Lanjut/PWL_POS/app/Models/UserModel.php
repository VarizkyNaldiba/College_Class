<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Hasone;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 'm_user';        // Nama tabel di database
    protected $primaryKey = 'user_id';  // Primary key

    protected $fillable = ['level_id', 'username', 'nama', 'password'];


    public function level(): BelongsTo    {
        return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
    }
}

