<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{   use HasUuids;
    use HasFactory;
    protected $fillable = [
        'from_id',
        'to_id',
        'content',
        'seen',
        'redirect_link'
    ];
}
