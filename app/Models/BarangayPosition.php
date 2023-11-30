<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Official;
class BarangayPosition extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function officials()
    {
        return $this->hasMany(Official::class);
    }
}
