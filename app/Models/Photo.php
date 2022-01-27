<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable =[
        'path'
    ];

    public function photoable()
    {
        return $this->morphTo();
    }

    public function getPathAttribute($value)
    {
        return asset("images/{$value}");
    }
}
