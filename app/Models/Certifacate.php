<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certifacate extends Model
{
    use HasFactory;
    protected $table = 'certificates';
    protected $fillable =  [
        'title',
        'content',
    ];
}
