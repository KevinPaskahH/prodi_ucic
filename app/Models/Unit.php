<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = [
        'level_id',
        'name',
        'slug',
    ];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }
}
