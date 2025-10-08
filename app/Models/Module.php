<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $table = 'modules';

    protected $fillable = [
        'name',
        'description',
        'is_active'
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
