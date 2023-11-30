<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BarangayPosition;
class Official extends Model
{
    use HasFactory;

    protected $fillable= [
        'firstname',
        'middlename',
        'lastname' ,
        'position',
        'term_start',
        'term_end'
    ];

    public function relation()
    {
        return $this->belongsTo(BarangayPosition::class,'position');
    }
}
