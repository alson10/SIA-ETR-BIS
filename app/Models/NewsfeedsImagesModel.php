<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsfeedsImagesModel extends Model
{
    use HasUuids;
    use HasFactory;
    protected $table = "newsfeeds_images";
    protected $fillable = [
        'path',
        'newsfeed_id',
    ];
}
