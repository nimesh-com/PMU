<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Allocation extends Model
{
    protected $table = 'allocations';

    protected $fillable = [
        'amount',
        'physical',
        'unit',
    ];
}
