<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
class Post extends Model
{
    use HasUuids;
    use HasFactory;
    
    protected $fillable = [
        'title',
        'thumbnail',
        'content',
        'status',
        'slug',
        'date_posted',
    ];
}
