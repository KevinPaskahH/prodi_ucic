<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    protected $fillable = [
        'level_id',
        'user_id',
        'unit_id',
        'foto',
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
