<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    protected $fillable = [
        'level_id',
        'unit_id',
        'user_id',
        'name',
        'prestasi',
        'juara',
        'foto',
        'tanggal',
    ];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

        public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
