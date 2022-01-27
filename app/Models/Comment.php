<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;

class Comment extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'comment',
        'post_id',
    ];

    protected $casts = [
        'created_at' => 'datetime:d-m-Y',
    ];

    public function post()
    {
        return $this->belongsTo(Post::Class);
    }


}
