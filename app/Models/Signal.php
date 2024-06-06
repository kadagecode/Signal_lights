<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Signal extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'sequence_a',
        'sequence_b',
        'sequence_c',
        'sequence_d',
        'green_interval',
        'yellow_interval',
    ];
}
