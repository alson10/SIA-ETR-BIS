<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request_list extends Model
{

    use HasUuids;
    use HasFactory;
    protected $table= "request_list";
    protected $fillable = [
        'owner_id',
        'service_id',
        'purpose',
        'status',
    ];

}

