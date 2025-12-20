<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Luaran extends Model
{
    use HasFactory;

    /**
     * Mass assignable attributes
     */
    protected $fillable = [
        'level_id',
        'unit_id',
        'name',
        'luaran',
        'juara',
        'foto',
        'tanggal',
    ];

    /**
     * Cast attributes
     */
    protected $casts = [
        'tanggal' => 'datetime',
    ];

    /**
     * 🔗 RELATIONS
     */

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
