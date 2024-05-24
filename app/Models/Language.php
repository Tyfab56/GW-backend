<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'included', 'image',
    ];

    public function hotels()
    {
        return $this->belongsToMany(Hotel::class, 'hotel_language');
    }
}
