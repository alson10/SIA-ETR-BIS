<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newscomment extends Model
{
    use HasFactory;
    protected $table = "news_comments";
    protected $fillable = [
        'user_id',
        'news_id',
        'comments',
    ];

    public function relation()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
