<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newsfeedscomment extends Model
{
    use HasFactory;
    protected $table = "newsfeeds_comment";
    protected $fillable = [
        'user_id',
        'newsfeeds_id',
        'comments',
    ];

    public function relation()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
