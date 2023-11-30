<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsfeedsModel extends Model
{
    use HasUuids;
    use HasFactory;
    protected $table = "newsfeeds";
    protected $fillable = [
        'content',
        'type',
    ];
}
