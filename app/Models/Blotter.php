<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blotter extends Model
{
    use HasFactory;
    protected $fillable = [
        'complainant_name',
        'respondent_name',
        'victims',
        'location',
        'date',
        'type',
        'about',
    ];
}
